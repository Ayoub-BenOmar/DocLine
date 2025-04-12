<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/find-doctor', function () {
    return view('find_doctor');
})->name('find_doctor');

Route::get('/articles', function(){
    return view('articles');
})->name('articles');

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::get('/doctor-form', function(){
    return view('doctor_form');
});

Route::get('/register', function(){
    return view('register');
})->name('register');

Route::post('/register',[AuthController::class,'register'])->name('register.submit');