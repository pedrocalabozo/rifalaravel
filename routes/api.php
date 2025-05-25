<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WinnerController;

// Authentication routes
Route::post('/auth/google', [GoogleController::class, 'login']);

// User profile routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
});

// Raffle routes
Route::get('/raffles', [RaffleController::class, 'index']);
Route::get('/raffles/{id}', [RaffleController::class, 'show']);
Route::post('/raffles/{id}/participate', [TicketController::class, 'store']);

// Ticket routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);
});

// Winner routes
Route::get('/winners', [WinnerController::class, 'index']);