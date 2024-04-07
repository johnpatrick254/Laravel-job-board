<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('', fn () => to_route('jobs.index'));
Route::get('login', fn () => to_route('auth.create'))->name('login');
Route::get('logout', fn () => to_route('auth.destroy'))->name('logout');
Route::delete('delete', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::apiResource('jobs', JobController::class);
Route::apiResource('auth', AuthController::class)->only(['create', 'store']);

require __DIR__ . '/auth.php';
