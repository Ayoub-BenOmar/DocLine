<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalCertificate;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function store(Request $request){
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

    public function accept(MedicalCertificate $certificate){
        $certificate->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Certificate accepted successfully.');
    }

    public function reject(MedicalCertificate $certificate){
        $certificate->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Certificate rejected successfully.');
    }
}
