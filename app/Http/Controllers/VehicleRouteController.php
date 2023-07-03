<?php
namespace App\Http\Controllers;

use App\Models\VehicleRoute;
use Illuminate\Http\Request;

class VehicleRouteController extends Controller
{
    public function index()
    {
        $vehicles = VehicleRoute::all();
        return view('/admin/activePublicVechicle', compact('vehicles'));
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
}

