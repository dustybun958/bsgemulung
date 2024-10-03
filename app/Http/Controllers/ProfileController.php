<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function PasswordForm()
    {
        return view('auth.ubah-password');
    }

    public function ubahPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // if (!Hash::check($request->current_password, auth()->user()->password)) {
        //     return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        // }

        // Update password
        // $user = auth()->user();
        // $user->update(['password' => bcrypt($request->password)]);

        // return redirect()->route('dashboard')->with('status', 'Password changed successfully!');
    }
}
