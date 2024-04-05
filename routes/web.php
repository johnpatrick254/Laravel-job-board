<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('',fn()=>to_route('jobs.index'));
Route::apiResource('jobs',JobController::class);

require __DIR__.'/auth.php';
