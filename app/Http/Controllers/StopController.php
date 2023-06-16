<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function index()
    {
        $stops = Stop::all();

        return view('admin.busStops', ['stops'=> $stops]);

        // You can return the stops to a view or perform any other logic
    }

    public function create()
    {
        // Return a view to create a new stop
    }

    public function store(Request $request)
    {
 
        $data = $request->validate([
            'info' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'vehicle_type' => 'required',
        ]);

        $stop = Stop::create($data);
        return redirect()->back()->with('message', 'Stop created successfully');
        // Perform any additional actions, such as redirecting or returning a response
    }

    public function edit($id)
    {
        $stop = Stop::findOrFail($id);

        // Return a view to edit the stop
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'info' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'vehicle_type' => 'required',
        ]);

        $stop = Stop::findOrFail($id);
        $stop->update($data);

        // Perform any additional actions, such as redirecting or returning a response
    }

    public function destroy($id)
    {
        $stop = Stop::findOrFail($id);
        $stop->delete();

        // Perform any additional actions, such as redirecting or returning a response
    }
}
