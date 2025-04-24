<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $doctors = User::with('speciality')->where('is_activated', false)->where('role', 'doctor')->latest()->take(3)->get();
        $allDoctors = User::all()->where('is_activated', true)->where('role', 'doctor');
        $allPatients = User::all()->where('role', 'patient');
        $allUsers = User::where('is_activated', true)->where('role', '!=', 'admin')->get();
        $allAppointments = Appointment::all();
        return view('admin.dashboard', compact('doctors', 'allDoctors', 'allPatients', 'allUsers', 'allAppointments'));
    }
}
