<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
use App\Models\City;
use App\Models\MedicalCertificate;
use App\Models\MedicalConsultation;
use App\Models\Speciality;
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
        // User Statistics
        $totalUsers = User::where('is_activated', true)->where('role', '!=', 'admin')->count();
        $totalDoctors = User::where('is_activated', true)->where('role', 'doctor')->count();
        $totalPatients = User::where('role', 'patient')->count();
        
        // Calculate growth rates (comparing current month to previous month)
        $currentMonthUsers = User::where('is_activated', true)
            ->where('role', '!=', 'admin')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();
        $lastMonthUsers = User::where('is_activated', true)
            ->where('role', '!=', 'admin')
            ->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth()
            ])->count();
        $userGrowthRate = $lastMonthUsers > 0 ? round(($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers * 100, 1) : 0;
        
        // Similar calculations for doctors and patients
        $currentMonthDoctors = User::where('is_activated', true)
            ->where('role', 'doctor')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();
        $lastMonthDoctors = User::where('is_activated', true)
            ->where('role', 'doctor')
            ->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth()
            ])->count();
        $doctorGrowthRate = $lastMonthDoctors > 0 ? round(($currentMonthDoctors - $lastMonthDoctors) / $lastMonthDoctors * 100, 1) : 0;
        
        $currentMonthPatients = User::where('role', 'patient')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();
        $lastMonthPatients = User::where('role', 'patient')
            ->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth()
            ])->count();
        $patientGrowthRate = $lastMonthPatients > 0 ? round(($currentMonthPatients - $lastMonthPatients) / $lastMonthPatients * 100, 1) : 0;
        
        // Appointment Statistics
        $totalAppointments = Appointment::count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $scheduledAppointments = Appointment::where('status', 'scheduled')->count();
        
        $completedAppointmentPercentage = $totalAppointments > 0 ? round(($completedAppointments / $totalAppointments) * 100, 1) : 0;
        $scheduledAppointmentPercentage = $totalAppointments > 0 ? round(($scheduledAppointments / $totalAppointments) * 100, 1) : 0;
        
        // Calculate appointment growth rate
        $currentMonthAppointments = Appointment::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $lastMonthAppointments = Appointment::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        $appointmentGrowthRate = $lastMonthAppointments > 0 ? round(($currentMonthAppointments - $lastMonthAppointments) / $lastMonthAppointments * 100, 1) : 0;
        
        // Medical Certificate Statistics
        $totalCertificates = \App\Models\MedicalCertificate::count();
        $pendingCertificates = \App\Models\MedicalCertificate::where('status', 'pending')->count();
        $approvedCertificates = \App\Models\MedicalCertificate::where('status', 'approved')->count();
        $rejectedCertificates = \App\Models\MedicalCertificate::where('status', 'rejected')->count();
        
        $pendingCertificatePercentage = $totalCertificates > 0 ? round(($pendingCertificates / $totalCertificates) * 100, 1) : 0;
        $approvedCertificatePercentage = $totalCertificates > 0 ? round(($approvedCertificates / $totalCertificates) * 100, 1) : 0;
        $rejectedCertificatePercentage = $totalCertificates > 0 ? round(($rejectedCertificates / $totalCertificates) * 100, 1) : 0;
        
        // Calculate certificate growth rate
        $currentMonthCertificates = \App\Models\MedicalCertificate::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $lastMonthCertificates = \App\Models\MedicalCertificate::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        $certificateGrowthRate = $lastMonthCertificates > 0 ? round(($currentMonthCertificates - $lastMonthCertificates) / $lastMonthCertificates * 100, 1) : 0;
        
        // Medical Files Statistics (assuming you have a MedicalFile model)
        $totalMedicalFiles = MedicalConsultation::count();
        
        // Calculate medical file growth rate
        $currentMonthMedicalFiles = MedicalConsultation::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $lastMonthMedicalFiles = MedicalConsultation::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->count();
        $medicalFileGrowthRate = $lastMonthMedicalFiles > 0 ? round(($currentMonthMedicalFiles - $lastMonthMedicalFiles) / $lastMonthMedicalFiles * 100, 1) : 0;
        
        // Average files per patient
        $avgFilesPerPatient = $totalPatients > 0 ? round($totalMedicalFiles / $totalPatients, 1) : 0;
        
        // Top Doctors by Appointments
        $topDoctors = User::where('role', 'doctor')
            ->where('is_activated', true)
            ->withCount(['appointmentsAsDoctor as total_appointments' => function($query) {
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
            }])
            ->withCount(['appointmentsAsDoctor as completed_appointments' => function($query) {
                $query->where('status', 'completed')
                    ->where('created_at', '>=', Carbon::now()->subDays(30));
            }])
            ->orderBy('total_appointments', 'desc')
            ->take(5)
            ->get();
        
        // Calculate completion rate for each doctor
        foreach ($topDoctors as $doctor) {
            $doctor->completion_rate = $doctor->total_appointments > 0 
                ? round(($doctor->completed_appointments / $doctor->total_appointments) * 100, 1) 
                : 0;
        }
        
        // Top Cities by Appointments
        $topCities = City::withCount(['user as appointments' => function($query) {
                $query->where('role', 'doctor')
                    ->whereHas('appointmentsAsDoctor', function($q) {
                        $q->where('created_at', '>=', Carbon::now()->subDays(30));
                    });
            }])
            ->orderBy('appointments', 'desc')
            ->take(5)
            ->get()
            ->map(function($city) {
                return (object) [
                    'name' => $city->name,
                    'appointments' => $city->appointments
                ];
            });
        
        // Top Specialties by Appointments
        $topSpecialties = Speciality::withCount(['user as appointments' => function($query) {
                $query->where('role', 'doctor')
                    ->whereHas('appointmentsAsDoctor', function($q) {
                        $q->where('created_at', '>=', Carbon::now()->subDays(30));
                    });
            }])
            ->orderBy('appointments', 'desc')
            ->take(5)
            ->get()
            ->map(function($specialty) {
                return (object) [
                    'name' => $specialty->name,
                    'appointments' => $specialty->appointments
                ];
            });
        
        // System Performance (example values - in a real app, these would come from monitoring tools)
        $serverResponseTime = 85; // milliseconds
        $serverResponseImprovement = 12; // percentage
        $uptime = 99.9; // percentage
        $uptimeImprovement = 0.2; // percentage
        $errorRate = 0.3; // percentage
        $errorRateImprovement = 0.1; // percentage
        
        return view('admin.statistics', compact(
            'totalUsers', 'totalDoctors', 'totalPatients',
            'userGrowthRate', 'doctorGrowthRate', 'patientGrowthRate',
            'totalAppointments', 'completedAppointments', 'scheduledAppointments',
            'completedAppointmentPercentage', 'scheduledAppointmentPercentage', 'appointmentGrowthRate',
            'totalCertificates', 'pendingCertificates', 'approvedCertificates', 'rejectedCertificates',
            'pendingCertificatePercentage', 'approvedCertificatePercentage', 'rejectedCertificatePercentage', 'certificateGrowthRate',
            'totalMedicalFiles', 'medicalFileGrowthRate', 'avgFilesPerPatient',
            'topDoctors', 'topCities', 'topSpecialties',
            'serverResponseTime', 'serverResponseImprovement', 'uptime', 'uptimeImprovement', 'errorRate', 'errorRateImprovement'
        ));
    }

    public function suspend(User $user)
    {
        $user->is_suspended = true;
        $user->save();

        return redirect()->back()->with('success', 'User suspended successfully.');
    }
}
