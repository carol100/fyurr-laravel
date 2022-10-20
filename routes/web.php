<?php

use App\Http\Controllers\Web\VenueController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('artists', ArtistController::class);
Route::get('artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('artists/{artist}/edit', [ArtistController::class, 'edit'])->name('artists.edit');

Route::resource('venues', VenueController::class);
Route::post('venues/search', [VenueController::class, 'search']);
Route::get('shows', function () {
    // 
})->name('shows');
