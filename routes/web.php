<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Category\CategoriesController;
use App\Http\Controllers\Site\Home\HomeController;
use App\Http\Controllers\Site\Post\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Contact\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('CMS')->group(function () {

    Route::get('/', HomeController::class)->name('home');
    Route::get('/categories',  CategoriesController::class)->name('categories');
    Route::resource('/post', PostController::class);


    Route::get('/login', [LoginController::class, 'login'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register',  [RegisterController::class, 'register'])->name('register.register');
    Route::get('/contact',  [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact',  [ContactController::class, 'store'])->name('contact.store');
});
