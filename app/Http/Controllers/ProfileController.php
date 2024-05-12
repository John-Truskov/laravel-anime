<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\BindUserRole;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = auth()->user();
        $bindUserRole = BindUserRole::where('user_id', $user->id)->first();
        $userRole = UserRole::where('id', $bindUserRole->role_id)->first();
        return view('profile.edit', ['user' => $user, 'role' => $userRole]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password) and $request->password == $request->confirm_password){
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        }
        $file = $request->file('avatar');
        if(!empty($file)){
            if(!empty($user->img)){
                Storage::delete(str_replace('/storage', 'public', $user->img));
            }
            $path = $file->store('public/profile_image');
            $user->img = str_replace('public','/storage', $path);
        }
        $user->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function showUserInfo(Request $request){
        $user = User::where('id', $request->userId)->first();
        $bindUserRole = BindUserRole::where('user_id', $user->id)->first();
        $userRole = UserRole::where('id', $bindUserRole->role_id)->first();
        return view('profile.show', [
            'user' => $user,
            'role' => $userRole->role,
        ]);
    }
}
