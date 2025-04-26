<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalCertificate;

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

    public function medicalCertificate(Request $request){
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'from_date' => 'required|date|after_or_equal:today',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required|string|max:500'
        ]);

        try {
            $certificate = MedicalCertificate::create([
                'patient_id' => Auth::id(),
                'doctor_id' => $request->doctor_id,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'reason' => $request->reason,
                'status' => 'pending'
            ]);

            return redirect()->route('patient.certificate')
                ->with('success', 'Your medical certificate request has been submitted successfully.');

        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'There was an error submitting your medical certificate request. Please try again.']);
        }
    }
}
