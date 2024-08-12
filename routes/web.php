<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

// Determined routes
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');



// Common route
Route::fallback([FallbackController::class, 'index']);

// Location routes
Route::get('/{country:slug}', [CountryController::class, 'show'])->name('country');
Route::get('/{region:slug}', [RegionController::class, 'show'])->name('region');

