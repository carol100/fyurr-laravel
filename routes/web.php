<?php

use App\Http\Controllers\Web\ArtistController;
use App\Http\Controllers\Web\HomeController;
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

Route::resource('artists', ArtistController::class);

Route::get('venues', function () {
    // 
})->name('venues');

Route::get('shows', function () {
    // 
})->name('shows');
