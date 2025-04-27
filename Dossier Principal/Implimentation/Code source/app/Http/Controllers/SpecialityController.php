<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'speciality'=>'required|string'
        ]);

        Speciality::create(['speciality_name'=>$request->speciality]);

        return redirect()->back()->with('success', 'Speciality added successfully');
    }
}
