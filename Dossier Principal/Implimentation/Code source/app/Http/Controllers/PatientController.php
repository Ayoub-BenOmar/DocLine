<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalCertificate;
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

    public function certificate()
    {
            $patient = Auth::user();
            $doctors = User::where('role', 'doctor')
                ->whereHas('appointmentsAsDoctor', function($query) use ($patient) {
                    $query->where('patient_id', $patient->id)
                        ->where('status', 'completed');
                })
                ->select('id', 'name', 'last_name')
                ->get();
            $certificates = MedicalCertificate::all();
            $acceptedCertificates = MedicalCertificate::all()->where('status', 'accepted');

            return view('patient.certificate', compact('doctors', 'certificates', 'acceptedCertificates'));
    }
}
