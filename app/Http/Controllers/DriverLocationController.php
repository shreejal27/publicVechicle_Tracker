<?php

namespace App\Http\Controllers;

use App\Models\DriverLocation;
use Illuminate\Http\Request;

class DriverLocationController extends Controller
{
    public function store(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $status = $request->input('status');

        $driverId = auth()->user()->id;

        $driverLocation = DriverLocation::updateOrCreate(
            ['driver_id' => $driverId],
            ['latitude' => $latitude, 'longitude' => $longitude, 'status' => $status]
        );

        // return response()->json(['message' => 'Location updated successfully']);

        return response()->json(['success' => true]);
    }

    public function getDriverLocation()
    {
        $driverLocation = DriverLocation::where('status', 'on')->latest()->first();

        return response()->json($driverLocation);
    }
}
