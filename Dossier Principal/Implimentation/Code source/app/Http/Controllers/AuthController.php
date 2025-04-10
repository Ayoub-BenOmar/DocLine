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
        $users = [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:patient,doctor',
        ];

        $roleRules = [];
        if ($request->userType === 'doctor') {
            $roleRules = [
                'specialty' => 'required|string|max:255',
                'medical_licence' => 'required|string|max:255|unique:doctors,medical_licence',
                'medical_document' => 'required|file|mimes:pdf|max:2048',
            ];
        } else {
            $roleRules = [
                'birthdate' => 'required|date',
            ];
        }

        $validatedData = $request->validate(array_merge($users, $roleRules));

        $licensePath = null;
        if ($request->hasFile('medical_document')) {
            $licensePath = $request->file('medical_document')->store('medical_licenses', 'public');
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
                'city' => '',
                'office_address' => '',
                'fees' => 0,
                'experience' => 0,
            ]);
        } else {
            Patient::create([
                'user_id' => $user->id,
                'birthdate' => $request->dateOfBirth,
                'gender' => '',
                'blood_type' => '',
                'past_illnesses' => '',
                'surgeries' => '',
                'allergies' => '',
                'chronic' => '',
            ]);
        }

        Auth::login($user);
        echo("register successfully");

        // Redirect based on user type
        // return redirect()->intended($request->userType === 'doctor' ? '/doctor/dashboard' : '/patient/dashboard')
        //             ->with('success', 'Registration successful!');
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
