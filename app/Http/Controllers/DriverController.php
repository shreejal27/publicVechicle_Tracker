<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\DriverLocation;
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
        // Validate the request data
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'contact_number' => [
                'required',
                'string',
                'unique:drivers,contact_number', // Assuming the drivers table is used for drivers
                'regex:/^98\d{8}$/u', // Custom regex rule for numbers starting with "98" and having 10 digits
            ],
            'address' => 'required|string',
            'license_number' => 'required|string|unique:drivers,license_number',
            'vehicle_type' => 'required|string',
            'vehicle_number' => 'required|string|unique:drivers,vehicle_number',
            'username' => 'required|string|unique:drivers,username',
            'password' => 'required|string|min:8',
        ]);
    
        // Create a new driver
        $driver = new Driver;
        $driver->fill($validatedData);
        $driver->save();
    
        return redirect()->back()->with('success', 'Driver has been registered successfully');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('driver_id');
        return redirect()->route('login')->with('success', 'Driver Logout successful');
    }

    public function adminViewDriver(){
        $drivers = Driver::all();

        $driverLocations = DriverLocation::where('status', 'on')->latest()->get();

        $workingDriverId = $driverLocations->pluck('driver_id');
        
        return view('admin.viewDriversReports', compact('drivers', 'workingDriverId'));
    }

    public function dashboard(){
        //get date today with just initials of day name
        $dateToday = date('D, d M Y');

        return view('driver.driverDashboard', compact('dateToday'));
    }
}
