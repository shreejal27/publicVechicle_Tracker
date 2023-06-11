<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        // $validatedData = $request->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required|email',
        //     'contact_number' => 'required|numeric',
        //     'username' => 'required',
        //     'password' => 'required|confirmed',
        // ]); 

        // User::create($validatedData);

        // return redirect()->back()->with('success', 'User created successfully');
    }

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
