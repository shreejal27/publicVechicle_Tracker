<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|numeric',
            'username' => 'required',
            'password' => 'required|confirmed',
        ]); 

        User::create($validatedData);

        // return redirect()->back()->with('success', 'User created successfully');
    }
}
