<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PasswordRequest;
use App\Http\Requests\admin\ProfileRequest;
use App\Http\Requests\admin\UserRequest;
use App\Models\Country;
use App\Models\Profile;
use App\Models\User;
use App\Services\GeneralService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    protected $generalService;

    public function __construct(GeneralService $generalService)
    {
        return $this->generalService = $generalService;
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $countries = Country::all();
        if ($user->profile == null) {
            return view('admin.profiles.show', ['user' => $user, 'countries' => $countries]);
        } else {
            $states = $this->generalService->getStates($user->profile->country_id);
            $cities = $this->generalService->getCities($user->profile->state_id);
            return view(
                'admin.profiles.show',
                ['user' => $user, 'countries' => $countries, 'states' => $states, 'cities' => $cities]
            );
        }
    }

    /**
     * updatePassword the password.
     */
    public function updatePassword(PasswordRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'password' => Hash::make($request->new_password_confirmation)
        ]);

        return redirect()->route('admin.users.edit', $user->id);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ProfileRequest $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->username,
            'email' => $request->email,
        ]);

        if ($request->hasFile('image')) {
            File::deleteDirectory('uploads/profiles/' . $user->name);
            $image = $request->file('image');
            $imageName = $request->username . '-' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles/' . $request->username), $imageName);
            $res = $user->profile()->updateOrCreate([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'country_id' => $request->country,
                'state_id' => $request->state,
                'city_id' => $request->city,
                'phone_number' => $request->phone_number,
                'image' => $imageName,
            ], ['user_id' => $user->id,]);
        }
        return redirect()->route('admin.profiles.show', $id);
    }


}
