<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\PasswordRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Api\AuthResource;
use App\Mail\EmailVerify;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        try {
            if (Auth::attempt($request->only('email', 'password'
            ))) {
                $user = User::where('email', $request->email)->first();

                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Login success',
                        "user" => new AuthResource($user),
                        "token" => $user->createToken("API TOKEN")->plainTextToken,
                    ], 200);
            }

            return response()->json(
                [
                    "status" => false,
                    "message" => 'Email or Password does not match',
                ], 401);


        } catch (Exception $e) {
            return response()->json(
                [
                    "status" => true,
                    "message" => $e->getMessage(),
                ], 500);
        }

    }

    public function register(RegisterRequest $request)
    {
        try {

            $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => 'user',
                    'password' => Hash::make($request->password)
                ]
            )->assignRole('user');

            return response()->json(
                [
                    "status" => true,
                    "message" => 'User created successfully, you must verify your email',
                    'user' => new AuthResource($user), "token" => $user->createToken("API TOKEN")->plainTextToken,
                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email', Rule::exists('users', 'email')],
            ]);

            $user = User::where('email', $request->email)->first();
            $user_id = $user->id;
            $code = rand(1000, 9999);

            DB::table('verifications')->updateOrInsert(["user_id" => $user_id], ["code" => $code]);
            Mail::to($user->email)->send(new EmailVerify($code));

            return response()->json(
                [
                    "status" => true,
                    "massage" => 'Code Send successfully, check your email',
                ], 200);
        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }


    public function confirmEmail(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email', Rule::exists('users', 'email')],
                'code' => ['required'],
            ]);

            $user = User::where('email', $request->email)->first();
            $user_id = $user->id;
            $code = DB::table('verifications')->where(["user_id" => $user_id])->value('code');

            if ($request->code != $code) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Invalid verification code, please send code again',
                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'Go to change your password',
                ], 200);
        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }

    public function changePassword(PasswordRequest $request)
    {
        try {

            $user = User::where('email', $request->email)->first();
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            return response()->json(
                [
                    "status" => true,
                    "message" => 'Password changed successfully',
                ], 200);
        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }

    }

    public function logout(Request $request)
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json(
                [
                    "status" => true,
                    "message" => 'Logout successfully',
                ], 200);
        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

}
