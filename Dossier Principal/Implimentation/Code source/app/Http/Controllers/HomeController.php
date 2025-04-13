<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $specialties = Speciality::all();
        return view('home', compact('specialties'));
    }
}
