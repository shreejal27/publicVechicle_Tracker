<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

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

    //     // Create a new admin record with the validated data
    //     $admin = Admin::create($validatedData);

    //     // Redirect to the admin index page with a success message
    //     return redirect()->route('admin.index')->with('success', 'Admin created successfully');
    // }

    // // Add other methods for edit, update, delete, etc., as per your requirements
}