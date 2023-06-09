<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Driver;

class LoginController extends Controller
{
    public function loginCheck(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $userType = $request->userType;

        // Example: Check if the username and password match a user in the database
        if ($userType === 'admin') {
            $admin = Admin::where('username', $username)->where('password', $password)->first();
            if ($admin) {
                return redirect()->route('adminDashboard')->with('success', 'Login successful');
            } else {
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        } elseif ($userType === 'user') {
            $user = User::where('username', $username)->where('password', $password)->first();
            if ($user) {
                // Authentication successful for user
                return redirect()->route('userDashboard')->with('success', 'Login successful');
            } else {
                // Authentication failed for user
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        } else {
            $driver = Driver::where('username', $username)->where('password', $password)->first();
            if ($driver) {
                // Authentication successful for driver
                return redirect()->route('driverDashboard')->with('success', 'Login successful');
            } else {
                // Authentication failed for driver
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        }
    }
}
