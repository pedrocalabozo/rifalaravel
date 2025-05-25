<?php

use App\Http\Controllers\appController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WinnerController;
use Illuminate\Auth\Events\Logout;

// // Welcome page
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', function () {
//     return view('welcome');
// })->name('home');
// // About page


Route::get('/', [appController::class, 'index'])->name('home');


// Authentication routes
Route::get('login', [GoogleController::class, 'redirectToGoogle'])->name('login');
Route::get('login/callback', [GoogleController::class, 'handleGoogleCallback']);

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Raffle routes
Route::get('raffles', [RaffleController::class, 'index'])->name('raffles.index');
Route::get('raffles/{id}', [RaffleController::class, 'show'])->name('raffles.show');

// Ticket routes
Route::middleware(['auth'])->group(function () {
    Route::post('raffles/{id}/participate', [TicketController::class, 'store'])->name('raffles.participate');
    Route::post('logout', [GoogleController::class, 'logout'])->name('logout');
});

// Winner routes
Route::get('winners', [WinnerController::class, 'index'])->name('winners.index');

// Rules page
Route::get('rules', function () {
    return view('rules');
})->name('rules');
