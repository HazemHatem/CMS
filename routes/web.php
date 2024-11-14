<?php

use App\Http\Controllers\site\category\CategoriesControllerSite;
use App\Http\Controllers\site\contact\ControllerControllerSite;
  use App\Http\Controllers\site\home\HomeControllerSite;
  use App\Http\Controllers\site\post\PostControllerSite;
  use App\Models\Author;
  use App\Models\User;
  use Illuminate\Support\Facades\Route;

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
 
    Route::get('/home', HomeControllerSite::class)->name('home');
    Route::get('/categories',  CategoriesControllerSite::class)->name('categories');
    Route::resource('/post', PostControllerSite::class);
    Route::resource('/contact',  ControllerControllerSite::class);
    // Route::resource('/login',  LoginControllerSite::class);


  });

 