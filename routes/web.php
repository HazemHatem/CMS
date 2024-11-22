<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\site\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Contact\ContactController;
use App\Http\Controllers\Site\Article\ArticleController;
use App\Http\Controllers\Site\Category\CategoryController;


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

    Route::get('/home', HomeController::class)->name('home');
    Route::resource('/article',  ArticleController::class);
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{category}/article', [CategoryController::class, 'article'])->name('category.article');
    Route::get('/login', [LoginController::class, 'login'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register',  [RegisterController::class, 'register'])->name('register.register');
    Route::get('/contact',  [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact',  [ContactController::class, 'store'])->name('contact.store');
});
