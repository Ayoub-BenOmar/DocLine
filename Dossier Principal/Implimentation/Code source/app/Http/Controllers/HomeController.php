<?php

namespace App\Http\Controllers;

use App\Models\City;
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

    public function find_doctor(Request $request)
    {
        $query = User::with(['speciality', 'city'])->where('role', 'doctor')->where('is_activated', true);
    
        if ($request->city_id) {
            $query->where('city_id', $request->city_id);
        }
    
        if ($request->speciality_id) {
            $query->where('speciality_id', $request->speciality_id);
        }
    
        if ($request->experience) {
            switch ($request->experience) {
                case '1-5':
                    $query->whereBetween('experience', [1, 5]);
                    break;
                case '5-10':
                    $query->whereBetween('experience', [5, 10]);
                    break;
                case '10-15':
                    $query->whereBetween('experience', [10, 15]);
                    break;
                case '15+':
                    $query->where('experience', '>=', 15);
                    break;
            }
        }
    
        if ($request->fees) {
            switch ($request->fees) {
                case '0-50':
                    $query->whereBetween('fees', [0, 10]);
                    break;
                case '50-100':
                    $query->whereBetween('fees', [10, 30]);
                    break;
                case '100-200':
                    $query->whereBetween('fees', [30, 50]);
                    break;
                case '200+':
                    $query->where('fees', '>=', 50);
                    break;
            }
        }
    
        $doctors = $query->paginate(6);
        $specialties = Speciality::all();
        $cities = City::all();
    
        return view('find_doctor', compact('specialties', 'cities', 'doctors'));
    }
    
}
