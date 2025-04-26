<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialityController;
use App\Http\Middleware\CheckDoctorActivation;

//Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/find-doctor', [HomeController::class, 'find_doctor'])->name('find-doctor');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/articles', function() {
    return view('articles');
})->name('articles');

//Doctor submit profile
Route::get('/doctor-form', [DoctorController::class, 'create'])->name('doctor-form');
Route::post('/doctor-form', [DoctorController::class, 'storeProfile'])->name('doctor.store-profile');
Route::get('/confirmation-page', function() {
    return view('confirmation_page');
})->name('doctor-confirmation');

//Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function() {
        return view('auth.login');
    })->name('login');
    Route::get('/register', function() {
        return view('auth.register');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Logout routes
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout.get');

//doctor routes
Route::prefix('doctor')
    ->name('doctor.')
    ->middleware(['auth', CheckRole::class . ':doctor', CheckDoctorActivation::class])
    ->group(function(){
        Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');
        Route::get('/appointments', [DoctorController::class, 'appointments'])->name('appointments');
        Route::post('/treatments', [DoctorController::class, 'storeTreatment'])->name('treatments.store');
        Route::post('/consultations', [DoctorController::class, 'storeConsultation'])->name('consultations.store');
});

//admin routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', CheckRole::class . ':admin'])
    ->group(function(){
        Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/doctors', [DoctorController::class, 'show'])->name('doctors');

        Route::get('/patients', [AdminController::class, 'patients'])->name('patients');

        Route::get('/contents', function() {
            return view('admin.contents');
        })->name('contents');

        Route::get('/statistics', function() {
            return view('admin.statistics');
        })->name('statistics');

        Route::get('/doctors/accept/{doctor}', [DoctorController::class, 'accept'])->name('accept.doctor');

});

//patient routes
Route::prefix('patient')
    ->name('patient.')
    ->middleware(['auth', CheckRole::class . ':patient'])
    ->group(function(){
        Route::get('/dashboard', function() {
            return view('patient.dashboard');
        })->name('dashboard');

        Route::post('/dashboard', [PatientController::class, 'store'])->name('store');

        Route::get('/appointments', function() {
            return view('patient.appointments');
        })->name('appointments');

        Route::get('/certificate', [PatientController::class, 'certificate'])->name('certificate');
        Route::post('/certificate', [PatientController::class, 'medicalCertificate'])->name('medical-certificate.store');

        Route::get('/medical_file', function() {
            return view('patient.medical_file');
        })->name('medical-file');

});



