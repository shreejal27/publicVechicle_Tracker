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
        $matchingVehicleNames = [];
        return view('/user/fareCalculator', compact('fares', 'matchingVehicleNames'));
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

        $distances = [
            'kuleshwor|kalimati' => 100,
            'kritipur|kalimati' => 200,
            // Add more entries as per your dataset
        ];


        $vehicleRoutes = VehicleRoute::all();
        $matchingVehicleNames = [];
        $distanceValue = 0;
        foreach ($vehicleRoutes as $vehicleRoute) {
            $routes = explode(', ', $vehicleRoute->vehicle_routes);

            if (in_array($from, $routes) && in_array($to, $routes)) {
                $matchingVehicleNames[] = $vehicleRoute->vehicle_name;

                $key1 = "$from|$to";
                $key2 = "$to|$from";

                if (isset($distances[$key1])) {
                    $distanceValue = $distances[$key1];
                } elseif (isset($distances[$key2])) {
                    $distanceValue = $distances[$key2];
                } else {
                    $distanceValue = 0;
                }
            }
        }
        // if (count($matchingVehicleNames) == 0) {
        //     $matchingVehicleNames[] = "no vehicle found";
        // }
        // dd($matchingVehicleNames);

        $fares = Fare::all(); // Retrieve all fares

        return view('/user/fareCalculator', compact('matchingVehicleNames', 'fares', 'distanceValue'));
    }
}
