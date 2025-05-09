<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Articles;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\MedicalCertificate;
use App\Models\MedicalConsultation;
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

    public function statistics()
    {
        $totalUsers = User::where('is_activated', true)->where('role', '!=', 'admin')->count();
        $totalDoctors = User::where('is_activated', true)->where('role', 'doctor')->count();
        $totalPatients = User::where('role', 'patient')->count();
        
        $totalAppointments = Appointment::count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $scheduledAppointments = Appointment::where('status', 'scheduled')->count();
        
        $totalCertificates = MedicalCertificate::count();
        $pendingCertificates = MedicalCertificate::where('status', 'pending')->count();
        $approvedCertificates = MedicalCertificate::where('status', 'accepted')->count();
        $rejectedCertificates = MedicalCertificate::where('status', 'rejected')->count();
        
        $totalMedicalFiles = MedicalConsultation::count();
        
        $avgFilesPerPatient = $totalPatients > 0 ? round($totalMedicalFiles / $totalPatients, 1) : 0;
        
        $topDoctors = User::where('role', 'doctor')
            ->where('is_activated', true)
            ->withCount(['appointmentsAsDoctor as total_appointments' => function($query) {
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
            }])
            ->orderBy('total_appointments', 'desc')
            ->take(5)
            ->get();
        
        $topCities = City::withCount(['user as appointments' => function($query) {
                $query->where('role', 'doctor')
                    ->whereHas('appointmentsAsDoctor', function($q) {
                        $q->where('created_at', '>=', Carbon::now()->subDays(30));
                    });
            }])
            ->orderBy('appointments', 'desc')
            ->first();
        
        $topSpecialties = Speciality::withCount(['user as appointments' => function($query) {
                $query->where('role', 'doctor')
                    ->whereHas('appointmentsAsDoctor', function($q) {
                        $q->where('created_at', '>=', Carbon::now()->subDays(30));
                    });
            }])
            ->orderBy('appointments', 'desc')
            ->first();
        
        return view('admin.statistics', compact(
            'totalUsers', 'totalDoctors', 'totalPatients',
            'totalAppointments', 'completedAppointments', 'scheduledAppointments',
            'totalCertificates', 'pendingCertificates', 'approvedCertificates', 'rejectedCertificates',
            'totalMedicalFiles', 'avgFilesPerPatient',
            'topDoctors', 'topCities', 'topSpecialties'
        ));
    }

    public function suspend(User $user)
    {
        $user->is_suspended = true;
        $user->save();

        return redirect()->back()->with('success', 'User suspended successfully.');
    }

    public function contents()
    {
        $articles = Articles::paginate(10);

        $specialties = Speciality::withCount('doctor')->latest()->get();

        $cities = City::withCount(['doctor', 'patient'])->latest()->get();
        return view('admin.contents', compact('articles', 'specialties', 'cities'));
    }
}
