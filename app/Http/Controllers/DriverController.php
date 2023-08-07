<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        // Retrieve all drivers from the database
        $drivers = Driver::all();

        // Return the drivers to a view or perform any other logic
    }

    public function store(Request $request)
    {
        // dd($request);
        $driver = new Driver;
        $driver->firstname = $request->firstname;
        $driver->lastname = $request->lastname;
        $driver->contact_number = $request->contact_number;
        $driver->address = $request->address;
        $driver->license_number = $request->license_number;
        $driver->vehicle_type = $request->vehicle_type;
        $driver->vehicle_number = $request->vehicle_number;
        $driver->username = $request->username;
        $driver->password = $request->password;
        $driver->save();

        return redirect()->back()->with('success', 'Driver has been registered successfully');

        // Redirect back or return a response as needed
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('driver_id');
        return redirect()->route('login')->with('success', 'Driver Logout successful');
    }
}
