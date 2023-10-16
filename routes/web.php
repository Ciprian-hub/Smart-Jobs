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
//Store Jobs data
Route::post('/jobs', [\App\Http\Controllers\JobController::class, 'store'])->middleware('auth');
//Show create form
Route::get('/jobs/create', [\App\Http\Controllers\JobController::class, 'create'])->middleware('auth');
//Show edit form
Route::get("/jobs/{job}/edit", [\App\Http\Controllers\JobController::class, 'edit']);
// Edit Submit to Update
Route::put('/jobs/{job}', [\App\Http\Controllers\JobController::class, 'update'])->middleware('auth');
// Delete Job
Route::delete('/jobs/{job}', [\App\Http\Controllers\JobController::class, 'destroy'])->middleware('auth');

// manage Jobs
Route::get('/jobs/manage', [\App\Http\Controllers\JobController::class, 'manage'])->middleware('auth');

// Single job
Route::get('/jobs/{job}', [\App\Http\Controllers\JobController::class, 'show']);

Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']);
Route::get('/register', [\App\Http\Controllers\UserController::class, 'create']);
Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/users/auth', [\App\Http\Controllers\UserController::class, 'auth']);


