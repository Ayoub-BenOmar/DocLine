<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // register fucntion
    public function register(Request $request)
{
    // Common validation for all users
    $users = [
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|max:20',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:patient,doctor',
    ];

    // Role-specific validation
    $roleRules = [];
    if ($request->userType === 'doctor') {
        $roleRules = [
            'specialty' => 'required|string|max:255',
            'licenseNumber' => 'required|string|max:255|unique:doctors,medical_licence',
            'licenseDocument' => 'required|file|mimes:pdf|max:2048',
        ];
    } else {
        $roleRules = [
            'dateOfBirth' => 'required|date',
        ];
    }

    $validatedData = $request->validate(array_merge($users, $roleRules));

    // Handle file upload for doctor's license document
    $licensePath = null;
    if ($request->hasFile('licenseDocument')) {
        $licensePath = $request->file('licenseDocument')->store('medical_licenses', 'public');
    }

    // Create user
    $user = User::create([
        'name' => $request->firstName . ' ' . $request->lastName,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'role' => $request->userType,
    ]);

    // Create role-specific record
    if ($request->userType === 'doctor') {
        Doctor::create([
            'user_id' => $user->id,
            'education' => $request->specialty,
            'medical_licence' => $request->licenseNumber,
            'medical_document' => $licensePath,
            // Initialize other doctor fields with default values
            'city' => '',
            'office_address' => '',
            'fees' => 0,
            'experience' => 0,
        ]);
    } else {
        Patient::create([
            'user_id' => $user->id,
            'birthdate' => $request->dateOfBirth,
            // Initialize other patient fields with default values
            'gender' => '',
            'blood_type' => '',
            'past_illnesses' => '',
            'surgeries' => '',
            'allergies' => '',
            'chronic' => '',
        ]);
    }

    // Log in the user
    Auth::login($user);

    // Redirect based on user type
    return redirect()->intended($request->userType === 'doctor' ? '/doctor/dashboard' : '/patient/dashboard')
                   ->with('success', 'Registration successful!');
}
    // public function register(Request $request){

    //     $request->validate([
    //         'name'=>'required|string|max:255',
    //         'email'=>'required|email|unique:users',
    //         'password'=>'required|confirmed|min:8',
    //         'phone'=>'required',
    //         'role'=>'required|in:patient,doctor',
    //     ]);

    //     $user = User::create([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=>Hash::make($request->password),
    //         'phone'=>$request->phone,
    //         'role'=>$request->role,
    //     ]);

    //     Auth::login($user);
    //     echo("register successfully");
    // }

    // login fucntion
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Incorrect Informations']);
    }

    // logout fucntion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
