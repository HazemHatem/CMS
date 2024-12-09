<?php

use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\site\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Contact\ContactController;
use App\Http\Controllers\Site\Article\ArticleController;
use App\Http\Controllers\Site\Category\CategoryController;
use App\Http\Controllers\Site\Comment\CommentController;
use App\Http\Controllers\Site\Profile\ProfileController;
use App\Http\Controllers\Site\Author\Dashboard\DashboardController;
use App\Http\Controllers\Site\Like\LikeController;
use App\Http\Controllers\Site\Rating\RatingController;
use App\Http\Controllers\Site\Wishlist\WishlistController;
use App\Http\Controllers\Site\Author\Post\PostController;


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
    Route::resource('/article', ArticleController::class);
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{category}/article', [CategoryController::class, 'article'])->name('category.article');
    Route::get('/login', [LoginController::class, 'login'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'register'])->name('register.register');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

    Route::middleware('auth')->group(function () {
        Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
        Route::post('/articles/{article}/toggle-like', [LikeController::class, 'toggleLike'])->name('articles.toggle-like')->middleware('auth');
        Route::post('/articles/{article}/rate', [RatingController::class, 'rateArticle'])->name('articles.rate')->middleware('auth');
        Route::resource('/profile', ProfileController::class);
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::patch('/profile/{profile}/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
        Route::resource('/wishlist', WishlistController::class);
    });
});

Route::prefix('Author')->as('Author.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard.index');
    Route::resource('/post', PostController::class);
});
