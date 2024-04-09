<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => to_route('jobs.index'));
Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::get('logout', fn () => to_route('auth.destroy'))->name('logout');
Route::delete('delete', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::apiResource('jobs', JobController::class);
Route::apiResource('auth', AuthController::class)->only(['create', 'store']);
Route::middleware('auth')->group(function () {
    Route::apiResource('jobs.application', JobApplicationController::class)->only(['create', 'store']);
    Route::apiResource('users.applications', ApplicationsController::class)->only(['create', 'destroy']);
    Route::apiResource('employers', EmployerController::class)->only(['create', 'store']);
});

require __DIR__ . '/auth.php';