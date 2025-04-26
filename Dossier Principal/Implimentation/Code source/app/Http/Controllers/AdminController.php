<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
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

    public function patients(){
        $patients = User::where('role', 'patient')->paginate(6);
        $newPatients = User::where('role', 'patient')->where('created_at', '>=', Carbon::now()->subDays(30))->get();
        $appointments = Appointment::all()->where('status', 'scheduled');

        return view('admin.patients', compact('patients', 'newPatients', 'appointments'));
    }
}
