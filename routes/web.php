<?php

use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => '/'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/genres', GenreController::class);
    Route::resource('/movies', MovieController::class);
});
