<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Category\CategoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\Author\AuthorController;
use App\Http\Controllers\API\Article\ArticleController;
use App\Http\Controllers\API\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/authors', AuthorController::class);
Route::apiResource('/articles', ArticleController::class);

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('account', [AuthController::class, 'getAccount'])->middleware('auth:api');
});
