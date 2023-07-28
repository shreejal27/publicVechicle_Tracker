<?php

namespace App\Http\Controllers;

use App\Models\DriverLocation;
use App\Models\Driver;
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

        $driverId = $driverLocations->pluck('driver_id');

        $driverDetails = [];
        foreach ($driverLocations as $location) {
            $driverName = $location->driver->firstname; // Access driver's firstname through the 'driver' relationship
            $vehicleType = $location->driver->vehicle_type; // Access driver's vehicle_type through the 'driver' relationship
    
            $driverDetails[] = [
                'driver_name' => $driverName,
                'vehicle_type' => $vehicleType,
            ];
        }
    
    return view('/admin/adminActivePublicVehicle', compact('driverLocations', 'driverDetails'));

    }

    public function getDriverLocationAjax(){
        $driverLocations = DriverLocation::where('status', 'on')->with('driver')->latest()->get();

        return response()->json($driverLocations);
    }

    public function getDriverLocationUser(){
        $driverLocations = DriverLocation::where('status', 'on')->latest()->get();
        
        $driverDetails = [];
        $i=0;
        foreach($driverLocations as $driverData){
            $driverDetails[$i]['driverId'] = $driverData->driver_id;

            //get driver name
            $driver = Driver::where('id', $driverData->driver_id)->first();

            
            $driverDetails[$i]['driverName'] = $driver->firstname;
            $driverDetails[$i]['vehicleType'] = $driver->vehicle_type;

            $driverDetails[$i]['latitude'] = $driverData->latitude;
            $driverDetails[$i]['longitude'] = $driverData->longitude;
            $driverDetails[$i]['status'] = $driverData->status;
            $i++;
        }
        return view('/user/trackPublicVehicle', compact('driverDetails'));
    }
}