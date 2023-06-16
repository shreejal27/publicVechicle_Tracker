<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

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
        $driver->address = $request->address;
        $driver->license_number = $request->license_number;
        $driver->contact_number = $request->contact_number;
        $driver->vehicle_number = $request->vehicle_number;
        $driver->username = $request->username;
        $driver->password = $request->password;
        $driver->save();
 
       return redirect()->back()->with('message', 'Driver has been registered successfully');

        // Redirect back or return a response as needed
    }

    // Add more methods as per your requirements
}
