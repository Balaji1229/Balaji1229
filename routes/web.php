<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ArticleController;




Route::get('/blog', [ArticleController::class, 'index'])->name('articles.index');

Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
// Route::get('/post', [ArticleController::class, 'post'])->name('articles.post');

Route::get('/blog-list', [ArticleController::class, 'blog_list'])->name('articles.blog-list');





//FrontEnd Route


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');



//BackEnd Route


Route::get('/my-dashboard', [DashController::class, 'dashboard'])->name('dashboard');


//Auth Controller

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-data', [AuthController::class, 'register_data'])->name('register-data');



