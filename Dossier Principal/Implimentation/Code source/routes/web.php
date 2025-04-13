<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, ('index')])->name('home');

Route::get('/find-doctor', function () {
    return view('find_doctor');
})->name('find_doctor');

Route::get('/articles', function(){
    return view('articles');
})->name('articles');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::prefix('admin')
    ->name('admin')
    ->middleware(['auth', ])
    ->group(function(){

    });

Route::prefix('doctor')
    ->name('doctor')
    ->middleware(['auth', ])
    ->group(function(){

    });

Route::prefix('patient')
    ->name('patient')
    ->middleware(['auth', ])
    ->group(function(){

    });

Route::get('/doctor-form', [SpecialityController::class, 'create']);

Route::get('/confirmation-page', function(){
    return view('waiting_page');
});

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::post('/register',[AuthController::class,'register'])->name('register.submit');

Route::get('/patient-dashboard', function(){
    return view('patient.dashboard');
})->name('patient-dashboard');

Route::get('/patient-appointments', function(){
    return view('patient.appointments');
})->name('patient-appointments');

Route::get('/doctor-dashboard', function(){
    return view('doctor.dashboard');
})->name('doctor-dashboard');

Route::get('/admin-dashboard', function(){
    return view('admin.dashboard');
})->name('admin-dashboard');

Route::get('/admin-doctors', function(){
    return view('admin.doctors');
})->name('admin-doctors');