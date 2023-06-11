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
        return redirect()->back()->with('status', 'Blog Post Form Data Has Been inserted');

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

    // public function print(Request $request)
    // {
    //     dd($request->all());
    // }
    
}
