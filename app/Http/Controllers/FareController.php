<?php

namespace App\Http\Controllers;

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

       
    }
}
