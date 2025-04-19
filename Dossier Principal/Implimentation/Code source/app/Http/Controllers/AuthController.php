<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register fucntion

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone'=> 'required|string',
            'password' => 'required|min:8',
            'role' => 'required|in:patient,doctor',
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_activated' => $request->role === 'patient'
        ]);

        Auth::login($user);
        if($request->role === 'doctor'){
            return redirect("/doctor-form");
        }else{
            return redirect('/');
        }
    }


    // login fucntion
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            switch ($user->role) {
                case 'doctor':
                    return redirect()->route('doctor.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'patient':
                    return redirect()->route('home');
                default:
                    return redirect()->route('home');
            }
        }

        return back()->withErrors(['email' => 'Incorrect Informations']);
    }

    // logout fucntion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}


    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'phone' => 'required|string|max:20',
    //         'password' => 'required|string|min:8',
    //         'role' => 'required|in:patient,doctor',
    //     ]);

    //     if ($request->role === 'doctor') {
    //         $request->validate([
    //             'medical_licence' => 'required|string',
    //             'medical_document' => 'required|file|mimes:pdf|max:2048',
    //             'speciality_id' => 'required|exists:speciality,id',
    //         ]);
    //     } else {
    //         $request->validate([
    //             'birthdate' => 'required|date',
    //         ]);
    //     }

    //     $licensePath = null;
    //     if ($request->hasFile('medical_document')) {
    //         try {
    //             $licensePath = $request->file('medical_document')->store('medical_licenses', 'public');
    //         } catch (\Exception $e) {
    //             return back()->withErrors(['medical_document' => 'Failed to upload document: ' . $e->getMessage()]);
    //         }
    //     }

    //     // Create user
    //     $user = User::create([
    //         'name' => $request->name,
    //         'last_name' => $request->last_name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'password' => Hash::make($request->password),
    //         'role' => $request->role,
    //     ]);

    //     // Create role-specific record
    //     if ($request->role === 'doctor') {
    //         Doctor::create([
    //             'user_id' => $user->id,
    //             'speciality_id' => $request->speciality_id,
    //             'medical_licence' => $request->medical_licence,
    //             'medical_document' => $licensePath,
    //             'education' => "",
    //             'city' => '',
    //             'office_address' => '',
    //             'fees' => 0,
    //             'experience' => 0,
    //         ]);
    //     } else {
    //         Patient::create([
    //             'user_id' => $user->id,
    //             'birthdate' => $request->birthdate,
    //             'gender' => null, // or 'male'/'female' based on your enum values
    //             'blood_type' => null, // or 'A+', 'O-', etc.
    //             'past_illnesses' => null, // Use null instead of empty string
    //             'surgeries' => null,
    //             'allergies' => null,
    //             'chronic' => null
    //         ]);
    //     }

    //     Auth::login($user);
    //     return ("hello");
    //     // Redirect based on user type
    //     // return redirect()->intended($request->role === 'doctor' ? '/doctor/dashboard' : '/patient/dashboard')
    //     //             ->with('success', 'Registration successful!');
    // }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|confirmed',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'patient',
    //     ]);

    //     Auth::login($user);
    //     return redirect('/patient/dashboard');
    // }