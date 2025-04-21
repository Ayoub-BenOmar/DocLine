<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Speciality;
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
    
    public function storeProfile(Request $request)
    {
        // validate  data
        $request->validate([
            'medical_licence' => 'required|string|unique:users,medical_licence',
            'medical_document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'speciality_id' => 'required|exists:speciality,id',
            'city_d' => 'required|exists:cities,id',
            'office_address' => 'required|string|max:255',
            'education' => 'required|string',
            'experience' => 'required|integer|min:0|max:70',
            'fees' => 'required|numeric|min:0',
        ]);

        try {
            // handle file upload
            $documentPath = $request->file('medical_document')->store('medical_documents', 'public');

            // update user profile with doctor details
            $user = Auth::user();
            $user->update([
                'medical_licence' => $request->medical_licence,
                'medical_document' => $documentPath,
                'speciality_id' => $request->speciality_id,
                'city' => $request->city,
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

            return back()
                ->withInput()
                ->withErrors(['error' => 'There was an error submitting your profile. Please try again.']);
        }
    }
}
