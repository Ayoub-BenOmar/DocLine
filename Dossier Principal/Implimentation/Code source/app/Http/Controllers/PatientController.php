<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalCertificate;
use App\Models\MedicalConsultation;
use App\Models\User;

class PatientController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'birthdate' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'past_illnesses' => 'required|string|max:50',
            'surgeries' => 'required|string|max:50',
            'allergies' => 'required|string|max:50',
            'chronic' => 'required|string|max:50'
        ]);

        try {
            $user = Auth::user();
            $user->update([
                'birthdate' => $request->birthdate,
                'gender' => $request->gender,
                'blood_type' => $request->blood_type,
                'past_illnesses' => $request->past_illnesses,
                'surgeries' => $request->surgeries,
                'allergies' => $request->allergies,
                'chronic' => $request->chronic
            ]);

            return redirect('/patient/dashboard')->with('success', 'Your personal informations has been updated.');

        } catch (\Throwable $th) {
            return back()
            ->withInput()
            ->withErrors(['error' => 'There was an error submitting your profile. Please try again.']);
        }
    }

    public function dashboard(){
        $patient_id = Auth::id();
        $appointments = Appointment::with('doctor')->where('patient_id', $patient_id)->where('status', 'scheduled')->get();
        $certificates = MedicalCertificate::where('patient_id', $patient_id)->where('status', 'pending')->get();
        $consultationFiles = MedicalConsultation::with('appointment.doctor', 'appointment.patient')->whereHas('appointment', function ($query) use ($patient_id){
            $query->where('patient_id', $patient_id);
        })->latest()->take(3)->get();
        $personalInfos = MedicalConsultation::with('appointment.patient')->whereHas('appointment', function ($query) use ($patient_id){
            $query->where('patient_id', $patient_id);
        })->latest()->first();
        return view('patient.dashboard', compact('appointments', 'certificates', 'consultationFiles', 'personalInfos'));
    }

    public function appointments(){
        $patient_id = Auth::id();
        $comingAppointments = Appointment::with('doctor')->where('patient_id', $patient_id)->where('status', 'scheduled')->get();
        $completedAppointments = Appointment::with('doctor')->where('patient_id', $patient_id)->where('status', 'completed')->get();

        return view('patient.appointments', compact('comingAppointments', 'completedAppointments'));
    }

    public function certificate()
    {
        $patient = Auth::user();

        // Get all doctors the patient has had appointments with
        $doctors = User::where('role', 'doctor')
            ->whereHas('appointmentsAsDoctor', function($query) use ($patient) {
                $query->where('patient_id', $patient->id)
                    ->where('status', 'completed');
            })
            ->select('id', 'name', 'last_name')
            ->get();

        // Get all medical certificates for the patient
        $certificates = MedicalCertificate::with([
            'doctor:id,name,last_name,medical_licence',
            'patient:id,name,last_name,birthdate,gender'
        ])
        ->where('patient_id', $patient->id)
        ->orderBy('created_at', 'desc')
        ->get();

        // Get accepted certificates with all related information
        $acceptedCertificates = MedicalCertificate::with([
            'doctor:id,name,last_name,medical_licence',
            'patient:id,name,last_name,birthdate,gender'
        ])
        ->where('patient_id', $patient->id)
        ->where('status', 'accepted')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('patient.certificate', compact('doctors', 'certificates', 'acceptedCertificates'));
    }

    public function medicalFile(){
        $patient_id = Auth::id();
        $medicalfiles = MedicalConsultation::with('appointment.doctor', 'appointment.patient', 'appointment.treatment')->whereHas('appointment', function ($query) use ($patient_id){
            $query->where('patient_id', $patient_id);
        })->get();

        return view('patient.medical_file', compact('medicalfiles'));
    }
}
