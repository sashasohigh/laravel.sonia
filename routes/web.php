<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ReferController;
use App\Http\Controllers\UserController;
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
Route::get('/register', [UserController::class, 'registerForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ReferController::class, 'index'])->name('home');

    Route::get('/show', [ReferController::class, 'show'])->name('show');
    Route::get('/create', [ReferController::class, 'create'])->name('create');
    Route::get('/deactivate/{id}', [ReferController::class, 'deactivate'])->name('deactivate');

    Route::get('/table_links', [ReferController::class, 'table_links'])->name('table_links');

    Route::get('/game', [GameController::class, 'game'])->name('game');
    Route::get('/history', [GameController::class, 'history'])->name('history');
});


