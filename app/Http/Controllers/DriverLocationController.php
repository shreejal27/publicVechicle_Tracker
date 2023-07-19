<?php

namespace App\Http\Controllers;

use App\Models\DriverLocation;
use Illuminate\Http\Request;

class DriverLocationController extends Controller
{
    public function store(Request $request)
    {
        
        // session([ 'latitude' => $request->latitude ]);  
        // session([ 'longitude' => $request->longitude ]);

       
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $status = $request->input('status');
        
        $driverId = session('driver_id');
        
        $driverLocation = DriverLocation::where('driver_id', $driverId)->first();
        
        if ($driverLocation) {
            $driverLocation->update([
                'latitude' => $latitude,
                'longitude' => $longitude,
                'status' => $status
            ]);
        } else {
            DriverLocation::create([
                'driver_id' => $driverId,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'status' => $status
            ]);
        }
    
        // Return a response to indicate the successful handling of the location data
        return response()->json(['success' => true]);

   
    }

    public function getDriverLocation()
    {
        $driverLocation = DriverLocation::where('status', 'on')->latest()->first();

        return response()->json($driverLocation);
    }

    public function getDriverLocationAdmin()
    {
        $driverLocations = DriverLocation::where('status', 'on')->latest()->get();
        dd("Hello");
        return view('/admin/adminActivePublicVehicle', compact('driverLocations'));
    }

}
