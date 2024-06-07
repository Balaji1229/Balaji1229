<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;




//FrontEnd Route


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');



//BackEnd Route


Route::get('/my-dashboard', [DashController::class, 'dashboard'])->name('dashboard');


//Auth Controller

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-data', [AuthController::class, 'register_data'])->name('register-data');