<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/restaurant/{restaurant}', [RestaurantController::class, 'show'])->name('restaurant.show');


Route::middleware(['auth'])->group(function () {

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');

        Route::get('/reviews', [UserController::class, 'reviews'])->name('reviews');
    });
});



