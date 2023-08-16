<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function index()
    // {
    //     // Logic for retrieving all admin records
    //     $admins = Admin::all();

    //     // Pass the admins data to the view
    //     return view('admin.index', compact('admins'));
    // }

    // public function create()
    // {
    //     // Return the create admin form view
    //     return view('admin.create');
    // }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('admin_id');
        return redirect()->route('login')->with('success', ' Logout successful');
    }
}
