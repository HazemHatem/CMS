<?php

use App\Http\Controllers\Admin\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Author\AuthorController;
use App\Http\Controllers\Admin\Article\ArticleController;
use App\Http\Controllers\Admin\Comment\CommentController;

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




Route::prefix('Admin')->as('Admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('throttle:10,1');
    Route::middleware('admin')->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('author', AuthorController::class);
        Route::resource('article', ArticleController::class);
        Route::resource('comment', CommentController::class);
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::resource('user', UserController::class);
        Route::resource('admin', AdminController::class);
        Route::get('/contact', ContactController::class)->name('contact');
        Route::resource('profile', ProfileController::class);
        Route::patch('/profile/{profile}/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');   
    });
   
});



