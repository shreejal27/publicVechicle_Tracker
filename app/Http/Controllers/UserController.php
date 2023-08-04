<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();
        return redirect()->back()->with('message', 'User has been registered successfully');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('user_id');
        return redirect()->route('login')->with('success', 'User Logout successful');
    }

    public function profile()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request){
        $userId = session('user_id');
        $user = User::find($userId);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->save();
        return redirect()->route('profile')->with('success', 'Your profile record has been updated successfully.');
    }

    public function updateUserCredentials(Request $request){
        dd($request);
    }
}
