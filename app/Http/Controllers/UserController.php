<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
