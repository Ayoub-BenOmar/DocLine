<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'city'=>'required|string'
        ]);

        City::create([
            'city'=>$request->city
        ]);

        return redirect()->back()->with('success', 'City added successfully!');
    }
}
