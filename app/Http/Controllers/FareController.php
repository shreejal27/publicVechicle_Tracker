<?php

namespace App\Http\Controllers;

use App\Models\Fare;
use App\Models\VehicleRoute;
use Illuminate\Http\Request;

class FareController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'distance' => 'required',
            'price' => 'required',
        ]);

        $fare = Fare::create($data);

        return redirect()->back()->with('message', 'Fare added successfully');
    }

    public function index()
    {
        $fares = Fare::all();
        return view('/admin/farePrice', compact('fares'));
    }

    public function getFare()
    {
        $fares = Fare::all();
        return view('/user/fareCalculator', compact('fares'));
    }

    public function edit($id)
    {
        $fare = Fare::where('id', $id)->first();
        return view('/admin/fareEdit', compact('fare'));
    }

    public function delete($id)
    {
        $fare = Fare::find($id);
        if ($fare) {
            $fare->delete();
            return redirect()->route('fares.index')->with('message', 'Fare deleted successfully.');
        }
        return redirect()->route('fares.index')->with('message', 'Fare not found.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'distance' => 'required',
            'price' => 'required',
        ]);

        $fare = Fare::findOrFail($id);
        $fare->distance = $data['distance'];
        $fare->price = $data['price'];
        $fare->save();

        return redirect()->route('fares.index')->with('message', 'Fare updated successfully.');
    }

    public function fareCalculator(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $weight = $request->input('weight');

        $vehicleRoutes = VehicleRoute::all();
        $matchingVehicleNames = [];

        foreach ($vehicleRoutes as $vehicleRoute) {
            $routes = explode(', ', $vehicleRoute->vehicle_routes);

            if (in_array($from, $routes) && in_array($to, $routes)) {
                $matchingVehicleNames[] = $vehicleRoute->vehicle_name;
            }
        }
        dd($matchingVehicleNames);
    }
}
