<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function profile()
    {
        $user = User::find(Auth::id());
        return view('user.profile', compact('user'));
    }


    public function edit()
    {
        $user = User::find(Auth::id());
        return view('user.profile_edit', compact('user'));
    }


    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);

            unlink(public_path('upload/user_images/' . $user->profile_photo_path));

            $user['profile_photo_path'] = $filename;
        }

        $user->save();

        $notification = array(
            'message' => "User profile updated successfully",
            'alert-type' => "success",
        );

        return redirect()->back()->with($notification);
    }



    public function editPassword()
    {
//        $user = User::find(Auth::id());
        return view('user.password.edit');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
//            Auth::logout();
            return view('user.password.edit');
        }
    }

}
