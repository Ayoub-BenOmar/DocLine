<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\Treatment;
use App\Models\MedicalConsultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function create(){
        $specialties = Speciality::all();
        $cities = City::all();
        return view('doctor_form', compact('specialties', 'cities'));
    }

    public function show(){
        $doctors = User::with('speciality')->where('is_activated', false)->where('role', 'doctor')->get();
        $activeDoctors = User::with('speciality')->where('is_activated', true)->where('role', 'doctor')->get();
        return view('admin.doctors', compact('doctors', 'activeDoctors'));
    }
    
    public function storeProfile(Request $request)
    {
        // validate  data
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120',
            'medical_licence' => 'required|string|unique:users,medical_licence',
            'medical_document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'speciality_id' => 'required|exists:speciality,id',
            'city_id' => 'required|exists:cities,id',
            'office_address' => 'required|string|max:255',
            'education' => 'required|string',
            'experience' => 'required|integer|min:0|max:70',
            'fees' => 'required|numeric|min:0',
        ]);

        try {
            // handle file upload
            $documentPath = $request->file('medical_document')->store('medical_documents', 'public');
            $picturePath = $request->file('profile_pic')->store('profile_pics', 'public');

            // update user profile with doctor details
            $user = Auth::user();
            $user->update([
                'profile_pic' => $picturePath,
                'medical_licence' => $request->medical_licence,
                'medical_document' => $documentPath,
                'speciality_id' => $request->speciality_id,
                'city_id' => $request->city_id,
                'office_address' => $request->office_address,
                'education' => $request->education,
                'experience' => $request->experience,
                'fees' => $request->fees,
                'is_activated' => false
            ]);

            // redirect to waiting page
            return redirect('/confirmation-page')->with('success', 'Your profile has been submitted for review.');

        } catch (\Exception $e) {
            // delete the uploaded file if it exists in error case
            if (isset($documentPath) && Storage::disk('public')->exists($documentPath)) {
                Storage::disk('public')->delete($documentPath);
            }

            if (isset($picturePath) && Storage::disk('public')->exists($picturePath)) {
                Storage::disk('public')->delete($picturePath);
            }

            return back()
                ->withInput()
                ->withErrors(['error' => 'There was an error submitting your profile. Please try again.']);
        }
    }

    public function accept(User $doctor)
    {
        $doctor->is_activated = true;
        $doctor->save();

        return redirect()->back()->with('success', 'Doctor accepted successfully.');
    }

    public function dashboard(){
        $doctorId = Auth::id();
        $appointments = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->whereDate('appointment_date', Carbon::today())
            ->get();
        $patients =  User::whereHas('appointmentsAsPatient', function ($query) use ($doctorId) {
            $query->where('doctor_id', $doctorId);
        })->get();

        return view('doctor.dashboard', compact('appointments', 'patients'));
    }

    public function appointments(){
        $doctorId = Auth::id();
        $appointments = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->paginate(5);
        $completedAppointments = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->where('status', 'completed')
            ->paginate(6);
        return view('doctor.appointments', compact('appointments', 'completedAppointments'));
    }

    public function storeTreatment(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medicament' => 'required|string|max:255',
            'dosage' => 'required|integer|min:1',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
        ]);

        try {
            $appointment = Appointment::findOrFail($request->appointment_id);
            
            $treatment = new Treatment([
                'medicament' => $request->medicament,
                'dosage' => $request->dosage,
                'frequency' => $request->frequency,
                'duration' => $request->duration,
                'appointment_id' => $request->appointment_id,
            ]);

            $treatment->save();

            return response()->json([
                'success' => true,
                'message' => 'Treatment plan added successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding treatment plan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeConsultation(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'raison_consultation' => 'required|string|max:1000',
            'weight' => 'required|integer|min:1',
            'bpm' => 'required|integer|min:1',
            'blood_pressure' => 'required|integer|min:1',
            'blood_sugar' => 'required|integer|min:1',
            'current_diagnosis' => 'required|string|max:1000',
            'symptoms' => 'required|string|max:1000',
            'doctor_note' => 'required|string|max:2000',
        ]);

        try {
            $appointment = Appointment::findOrFail($request->appointment_id);
            
            $consultation = new MedicalConsultation([
                'raison_consultation' => $request->raison_consultation,
                'weight' => $request->weight,
                'bpm' => $request->bpm,
                'blood_pressure' => $request->blood_pressure,
                'blood_sugar' => $request->blood_sugar,
                'current_diagnosis' => $request->current_diagnosis,
                'symptoms' => $request->symptoms,
                'doctor_note' => $request->doctor_note,
                'date' => now(),
                'appointment_id' => $request->appointment_id,
            ]);

            $consultation->save();

            return response()->json([
                'success' => true,
                'message' => 'Medical consultation added successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding medical consultation: ' . $e->getMessage()
            ], 500);
        }
    }
}
