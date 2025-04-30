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

        $existingAppointment = Appointment::where('patient_id', Auth::id())
            ->where('doctor_id', $request->doctor_id)
            ->whereIn('status', ['scheduled']) // adjust if needed
            ->whereDate('appointment_date', '>=', now()->toDateString())
            ->first();

        if ($existingAppointment) {
            return response()->json([
                'success' => false,
                'message' => 'You already have an upcoming appointment with this doctor. Please wait until it is completed before booking another.'
            ], 422);
        }

        $medicalDocument = null;
        if ($request->hasFile('medical-document')) {
            $medicalDocument = $request->file('medical-document')->store('medical-documents', 'public');
        }

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
        $appointment->load(['doctor', 'doctor.speciality']);

        return response()->json([
            'success' => true,
            'message' => 'Appointment scheduled successfully',
            'appointment' => $appointment
        ]);
    }

    public function unavailableTimes(Request $request)
    {
        $doctorId = $request->doctor_id;
        $date = $request->appointment_date;

        $taken = Appointment::where('doctor_id', $doctorId)
            ->where('appointment_date', $date)
            ->whereIn('status', ['scheduled', 'rescheduled']) // Only consider active appointments
            ->pluck('appointment_time');

        return response()->json($taken);
    }

    public function completed(Appointment $appointment){
        $appointment->update(['status' => 'completed']);

        return redirect()->back()->with('sucsess', 'Appointment completed');
    }

    public function reschedule(Request $request, Appointment $appointment)
    {
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
        ]);
        
        $existingAppointment = Appointment::where('doctor_id', $appointment->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->where('id', '!=', $appointment->id)
            ->first();
        
        if ($existingAppointment) {
            return redirect()->back()->with('error', 'The selected time slot is already booked. Please choose another time.');
        }
        
        $appointment->update([
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'rescheduled',
        ]);
        
        // You could notify the patient via email about the rescheduled appointment here
        
        return redirect()->back()->with('success', 'Appointment rescheduled successfully.');
    }

}
