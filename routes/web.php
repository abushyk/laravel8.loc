<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

function parseLocale(){
    $resulted_locale = null;
    $lang = request()->segment(1);
    if(false !== $locale = array_search($lang, config('language')['languages'])){
        app()->setLocale($locale);
        URL::defaults(['locale' => $lang]);
        $resulted_locale = $lang;
    }
    return $resulted_locale;
}

Route::prefix(parseLocale())
    //->middleware(\App\Http\Middleware\Localization::class)
    ->group(function(){
        // Home route
        Route::get('/', [HomeController::class, 'index']);

        Route::prefix('admin')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index']);
            Route::get('/country', [\App\Http\Controllers\Admin\CountryController::class, 'index']);
        });

// Specific routes
        Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');

// Greedy route
        Route::get('/{any}', [FallbackController::class, 'index'])->where('any', '.*');

// Location routes
        Route::get('/{country:slug}', [FallbackController::class, 'empty'])->name('country');
        Route::get('/{region:slug}', [FallbackController::class, 'empty'])->name('region');
    });


