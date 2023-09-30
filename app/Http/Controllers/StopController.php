<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function stopMarkerAdmin()
    {
        $stops = Stop::all();

        return view('admin.busStops', ['stops'=> $stops]);
       // You can return the stops to a view or perform any other logic
    }
    public function stopMarkerUser()
    {
        $stops = Stop::all();
        return view('/user/nearestBusStop', compact('stops'));
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
        $stop = Stop::where('id', $id)->first();
        return view('/admin/busStopsEdit', compact('stop'));
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

        return redirect()->route('stopMarkerAdmin')->with('message', 'Stop updated successfully.');
    }

    public function delete($id)
    {
        $stop = Stop::find($id);
        if ($stop) {
            $stop->delete();
            return redirect()->route('stopMarkerAdmin')->with('message', 'Stop Data deleted successfully.');
        }
        return redirect()->route('stopMarkerAdmin')->with('message', 'Stop Details not found.');
    }

    // public function getStopLocationAjax(){
    //     $stopLocations = Stop::all();
    //     return response()->json($stopLocations);
    // }
}
