<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All Routes related to Admin dashboard are found here. Have fun!
|
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::get('/restaurants', [AdminController::class, 'restaurants'])->name('restaurants');

        Route::get('/users', [AdminController::class, 'users'])->name('users');

        Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews');
    });
});

Route::get('/reviews/delete/{review}', [AdminController::class, 'delete_review'])->name('review.delete');


