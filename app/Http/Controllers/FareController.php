<?php

namespace App\Http\Controllers;

use App\Models\Fare;
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
}
