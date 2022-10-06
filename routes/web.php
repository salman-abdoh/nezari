<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return redirect()->route(app()->getLocale());
// });
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
// Route::group(['prefix' => '{locale}', 'middleware'=>['setlocale'] ], function () {
    Route::get('/', [\App\Http\Controllers\indexController::class,'index'])->name('home-locale');

Route::get('/show/{id}', [\App\Http\Controllers\indexController::class,'showproduct'])->name('products_data');

Route::resource('contact', \App\Http\Controllers\ContactController::class);
Route::resource('about', \App\Http\Controllers\AboutController::class);
Route::resource('index', \App\Http\Controllers\indexController::class);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
