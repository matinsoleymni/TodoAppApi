<?php

use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get('/login' , function(){
    return view("auth.login");
})->name("login");

Route::get('/register' , function(){
    return view("auth.register");
})->name("register");

Route::post('/register' , [ProviderController::class , "register"])->name("register.post");