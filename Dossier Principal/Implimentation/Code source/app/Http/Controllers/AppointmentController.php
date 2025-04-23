<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'appointment_date' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) {
                    $date = Carbon::parse($value);
                    if ($date->isWeekend()) {
                        $fail('Appointments are not available on weekends.');
                    }
                }
            ],
            'appointment_time' => [
                'required',
                'in:09:00,09:30,10:00,10:30,11:00,11:30,13:00,13:30,14:00,14:30,15:00,15:30,16:00,16:30'
            ],
            'visit_type' => [
                'required',
                'in:new-patient,follow-up,annual-checkup,urgent'
            ],
            'doctor_id' => 'required|exists:users,id',
            'insurance' => 'nullable|string',
            'medical-document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240'
        ]);

        // Handle file upload if exists
        $medicalDocument = null;
        if ($request->hasFile('medical-document')) {
            $medicalDocument = $request->file('medical-document')->store('medical-documents', 'public');
        }

        // Create the appointment
        $appointment = Appointment::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->input('appointment_date'),
            'appointment_time' => $request->input('appointment_time'),
            'visit_type' => $request->input('visit_type'),
            'insurance_provider' => $request->input('insurance'),
            'medical_documents' => $medicalDocument,
            'status' => 'scheduled'
        ]);

        // Load the doctor and speciality relationships
        $appointment->load(['doctor', 'doctor.speciality']);

        // Send notification to doctor
        // TODO: Implement notification system

        return response()->json([
            'success' => true,
            'message' => 'Appointment scheduled successfully',
            'appointment' => $appointment
        ]);
    }
}
