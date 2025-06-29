<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{id}', [JobController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/jobs', [JobController::class, 'store']);
    Route::put('/jobs/{id}', [JobController::class, 'update'])->middleware('is.job.owner');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->middleware('is.job.owner');
});