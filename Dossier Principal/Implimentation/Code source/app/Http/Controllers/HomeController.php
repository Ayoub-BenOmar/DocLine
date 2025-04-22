<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Speciality;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $specialties = Speciality::all();
        $doctors = User::with('speciality')->where('is_activated', true)->where('role', 'doctor')->latest()->take(3)->get();
        return view('home', compact('specialties', 'doctors'));
    }
}
