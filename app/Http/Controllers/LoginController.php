<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginCheck(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Example: Check if the username and password match a user in the database
        if ($username === 'shree' && $password === 'shree') {
            // Authentication successful
            return redirect()->route('adminIndex')->with('success', 'Login successful');
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }
}
