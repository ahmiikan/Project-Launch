<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('changePassword');
    }

    function edit(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required',
                'new_password' => 'required|string|min:8',
                'new_password_confirmation' => 'required',
            ],
            [
                'current_password.required' => 'Current Password field is required.',
                'new_password.required' => 'New Password field is required.',
                'new_password_confirmation.required' => 'New Password Confirmation field is required.',
            ]
        );
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        if (!Hash::check($current_password, Auth::user()->password)) {
            return redirect("changepassword")->with('error', "Old Password Doesn't match!");
        } else if (Hash::check($new_password, Auth::user()->password)) {
            return redirect("changepassword")->with('danger', "New password can not be the old password!");
        } else {
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            return redirect("changepassword")->with('message', "Password changed successfully!");
        }
    }
}
