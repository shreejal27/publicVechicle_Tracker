<?php

namespace App\Http\Controllers;

use App\Models\VehicleRoute;
use Illuminate\Http\Request;

class VehicleRouteController extends Controller
{
    public function index()
    {
        $vehicles = VehicleRoute::all();
        return view('/admin/adminVehicleRoute', compact('vehicles'));
    }


    public function getVehicle()
    {
        $vehicles = VehicleRoute::all();
        return view('/user/nearestBusStop', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_name' => 'required',
            'vehicle_routes' => 'required',
        ]);

        $route = VehicleRoute::create($data);

        // Optional: Add a success message or redirect to a specific page
        return redirect()->back()->with('message', 'Vehicle route added successfully');
    }

    public function delete($id)
    {
        $vehicle = VehicleRoute::find($id);
        if ($vehicle) {
            $vehicle->delete();
            return redirect()->route('vehicleRoute.index')->with('message', 'Vehicle Data deleted successfully.');
        }
        return redirect()->route('vehicleRoute.index')->with('message', 'Vehicle Data not found.');
    }

    public function edit($id)
    {
        $vehicleDetails = VehicleRoute::where('id', $id)->first();
        return view('/admin/vehicleRouteEdit', compact('vehicleDetails'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'vehicle_name' => 'required',
            'vehicle_routes' => 'required',
        ]);

        $vehicleDetails = VehicleRoute::findOrFail($id);
        $vehicleDetails->vehicle_name = $data['vehicle_name'];
        $vehicleDetails->vehicle_routes = $data['vehicle_routes'];
        $vehicleDetails->save();

        return redirect()->route('vehicleRoute.index')->with('message', 'Fare updated successfully.');
    }
}
