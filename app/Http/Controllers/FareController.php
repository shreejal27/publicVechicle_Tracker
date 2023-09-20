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
            'distance' => 'required|integer',
            'price' => 'required|integer',
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
        $sessionValue = 0;
        return view('/user/fareCalculator', compact('fares', 'matchingVehicleNames', 'sessionValue'));
    }

    public function getDriverFare()
    {
        $fares = Fare::all();
        $matchingVehicleNames = [];
        $sessionValue = 0;
        return view('/driver/driverFareCalculator', compact('fares', 'sessionValue'));
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
            'distance' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $fare = Fare::findOrFail($id);
        $fare->distance = $data['distance'];
        $fare->price = $data['price'];
        $fare->save();

        return redirect()->route('fares.index')->with('message', 'Fare updated successfully.');
    }

    public function fareCalculator(Request $request)
    {
        $sessionValue = 1;
        $from = $request->input('from');
        $to = $request->input('to');
        $weight = $request->input('weight');

        if ($weight == null) {
            $weight = 0;
        }

        if ($weight <= 15) {
            // Free allowance of up to 15 kg
            $weightPrice = 0;
        } else {
            // Charge Rs 5 per 10 kg for weight exceeding 15 kg
            $extraWeight = $weight - 15;
            $extraWeightCalculation = ceil($extraWeight / 10); // Round up to the nearest multiple of 10
            $weightPrice = $extraWeightCalculation * 5;
        }


        $distances = include '../data/distancesBetweenPlaces.php';


        $vehicleRoutes = VehicleRoute::all();
        $matchingVehicleNames = [];
        $distanceValue = 0;

        $fares = Fare::all();
        $totalFare = 0;
        $distance = 0;
        foreach ($vehicleRoutes as $vehicleRoute) {
            $routes = explode(', ', $vehicleRoute->vehicle_routes);

            if (in_array($from, $routes) && in_array($to, $routes)) {
                $matchingVehicleNames[] = $vehicleRoute->vehicle_name;

                $key1 = "$from|$to";
                $key2 = "$to|$from";

                if (isset($distances[$key1])) {
                    $distance = $distances[$key1];
                } elseif (isset($distances[$key2])) {
                    $distance = $distances[$key2];
                } else {
                    $distance = 0;
                }

                $fares = Fare::all();
                foreach ($fares as $fare) {
                    if ($distance <= $fare->distance) {
                        // $distanceValue = $fare->distance;
                        $price = $fare->price;
                        break;
                    }
                    else {
                        //what to do when distance is not set in database?
                        $price = 0;
                        break;
                    }
                }
                // dd($distanceValue, $weight, $price);
                $totalFare =  $weightPrice + $price;
            }
        }
        // Retrieve all fares
        return view('/user/fareCalculator', compact('matchingVehicleNames', 'fares', 'distance', 'totalFare', 'sessionValue'));
    }


    public function driverFareCalculator(Request $request)
    {
        $sessionValue = 1;

        $from = $request->input('from');
        $to = $request->input('to');
        $weight = $request->input('weight');

        if ($weight == null) {
            $weight = 0;
        }

        if ($weight <= 15) {
            // Free allowance of up to 15 kg
            $weightPrice = 0;
        } else {
            // Charge Rs 5 per 10 kg for weight exceeding 15 kg
            $extraWeight = $weight - 15;
            $extraWeightCalculation = ceil($extraWeight / 10); // Round up to the nearest multiple of 10
            $weightPrice = $extraWeightCalculation * 5;
        }


        $distances = include '../data/distancesBetweenPlaces.php';


        $vehicleRoutes = VehicleRoute::all();
        // $matchingVehicleNames = [];
        $distanceValue = 0;

        $fares = Fare::all();
        $totalFare = 0;
        $distance = 0;
        foreach ($vehicleRoutes as $vehicleRoute) {
            $routes = explode(', ', $vehicleRoute->vehicle_routes);

            if (in_array($from, $routes) && in_array($to, $routes)) {
                // $matchingVehicleNames[] = $vehicleRoute->vehicle_name;

                $key1 = "$from|$to";
                $key2 = "$to|$from";

                if (isset($distances[$key1])) {
                    $distance = $distances[$key1];
                } elseif (isset($distances[$key2])) {
                    $distance = $distances[$key2];
                } else {
                    $distance = 0;
                }

                $fares = Fare::all();
                foreach ($fares as $fare) {
                    if ($distance <= $fare->distance) {
                        // $distanceValue = $fare->distance;
                        $price = $fare->price;
                        break;
                    }
                }
                // dd($distanceValue, $weight, $price);
                $totalFare =  $weightPrice + $price;
            }
        }

        // Retrieve all fares

        return view('/driver/driverFareCalculator', compact('fares', 'distance', 'totalFare', 'sessionValue'));
    }
}
