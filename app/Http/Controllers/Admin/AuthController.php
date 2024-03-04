<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Api\PasswordRequest;
use App\Mail\EmailVerify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = Auth::attempt($request->only('email', 'password'));
            if ($user) {
                return redirect()->route('admin.home.index');
            }
            return redirect()->back()->withInput()->with(['message-error' => 'The provided credentials do not match our records.']);


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function resetPasswordForm()
    {
        return view('admin.auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email', Rule::exists('users', 'email')],
            ]);

            $user = User::where('email', $request->email)->first();
            $code = rand(1000, 9999);
            DB::table('verifications')->updateOrInsert(["user_id" => $user->id], ["code" => $code]);
            Mail::to($user->email)->send(new EmailVerify($code));
            return redirect()->route('admin.confirmEmailForm')->with(['message-success' => 'Check your mail.']);


        } catch (Exception $e) {
            return $e->getMessage();

        }

    }

    public function confirmEmailForm()
    {
        return view('admin.auth.confirm-email');
    }

    public function confirmEmail(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => ['required', 'email', Rule::exists('users', 'email')],
                'code' => ['required', Rule::exists('verifications', 'code')],
            ]);
            return redirect()->route('admin.changePasswordForm')->with(['message-success' => 'Change your password now.']);


        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function changePasswordForm()
    {
        return view('admin.auth.change-password');
    }

    public function changePassword(PasswordRequest $request)
    {
        try {

            $user = User::where('email', $request->email)->first();
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->route('admin.loginForm')->with(['message-success' => 'Password changed successfully']);

        } catch (Exception $e) {
            return  $e->getMessage();

        }

    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.loginForm')->with(['message' => '']);
    }

}
