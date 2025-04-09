<?php

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

Route::get('/register', function(){
    return view('register');
})->name('register');