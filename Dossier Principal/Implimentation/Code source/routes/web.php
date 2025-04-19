<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialityController;

//Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/find-doctor', function () {
    return view('find_doctor');
})->name('find-doctor');
Route::get('/articles', function() {
    return view('articles');
})->name('articles');

//Doctor submit profile
Route::get('/doctor-form', [DoctorController::class, 'create'])->name('doctor-form');
Route::post('/doctor-form', [DoctorController::class, 'storeProfile'])->name('doctor.store-profile');
Route::get('/confirmation-page', function() {
    return view('waiting_page');
})->name('doctor.confirmation');

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
    ->middleware(['auth', CheckRole::class . ':doctor'])
    ->group(function(){
        Route::get('/dashboard', function() {
            return view('doctor.dashboard');
        })->name('dashboard');
});

//admin routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', CheckRole::class . ':admin'])
    ->group(function(){
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/doctors', function() {
            return view('admin.doctors');
        })->name('doctors');

});

//patient routes
Route::prefix('patient')
    ->name('patient.')
    ->middleware(['auth', CheckRole::class . ':patient'])
    ->group(function(){
        Route::get('/dashboard', function() {
            return view('patient.dashboard');
        })->name('dashboard');

        Route::get('/appointments', function() {
            return view('patient.appointments');
        })->name('appointments');

        Route::get('/certificate', function() {
            return view('patient.certificate');
        })->name('certificate');

});



    Route::get('/confirmation-page', function(){
    return view('waiting_page');
});

