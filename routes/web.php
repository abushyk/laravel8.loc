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
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');



// Common route
Route::get('/{any}', [FallbackController::class, 'index'])->where('any', '.*');;

// Location routes
Route::get('/{country:slug}', [FallbackController::class, 'empty'])->name('country');
Route::get('/{region:slug}', [FallbackController::class, 'empty'])->name('region');

