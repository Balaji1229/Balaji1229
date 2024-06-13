<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);



/////////////////////////// post - Pipeline ///////////////////////////////////

Route::get('post', [RegisterController::class, 'post'])->name('post');
Route::post('/posts', [RegisterController::class, 'store'])->name('posts');



//////////////////////////////////// Lazy Loading & Eagar Loading //////////////////////////////

Route::get('get-post-one', [RegisterController::class, 'post_post_one'])->name('get-post-one');
Route::get('get-post', [RegisterController::class, 'post_post'])->name('get-post');


