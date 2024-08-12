<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FallbackController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/x{country:slug}', [CountryController::class, 'show'])->name('located.country');
Route::get('/x{region:slug}', [RegionController::class, 'show'])->name('located.region');

Route::fallback([FallbackController::class, 'index']);

//Route::get('/{slug}', [FallbackController::class, 'empty'])->name('located');
//Route::get('/{slug}', [FallbackController::class, 'empty'])->name('country.show');
//Route::get('/{slug}', [FallbackController::class, 'empty'])->name('region.show');
