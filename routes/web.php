<?php

use App\Models\Job;
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
// All jobs
Route::get('/', [\App\Http\Controllers\JobController::class, 'index']);
Route::post('/jobs', [\App\Http\Controllers\JobController::class, 'store']);
Route::get('/jobs/create', [\App\Http\Controllers\JobController::class, 'create']);



// Single job
Route::get('/jobs/{job}', [\App\Http\Controllers\JobController::class, 'show']);
