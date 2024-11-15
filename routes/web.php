<?php

use App\Http\Controllers\site\category\CategoriesController;
use App\Http\Controllers\site\home\HomeController;
use App\Http\Controllers\site\post\PostController;
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
    Route::get('/home', HomeController::class)->name('home');
    Route::get('/categories',  CategoriesController::class)->name('categories');
    Route::resource('/post', PostController::class);
    Route::get('/contact',  [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact',  [ContactController::class, 'store'])->name('contact.store');
});
