<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
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
Route::get('/', [JobController::class, 'index']);
//Store Jobs data
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
//Show create form
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth')->name('jobs.create');
//Show edit form
Route::get("/jobs/{job}/edit", [JobController::class, 'edit']);
// Edit Submit to Update
Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
// manage Jobs
Route::get('/jobs/manage', [JobController::class, 'manage'])->middleware('auth')->name("jobs.manage");
// Delete Job
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');
// Single job
Route::get('/jobs/{job}', [JobController::class, 'show']);
// Apply
Route::post('/jobs/{job}', [JobController::class, 'apply']);


Route::post('/users', [UserController::class, 'store']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/auth', [UserController::class, 'auth']);
Route::get('/users/profile', [UserController::class, 'editProfile'])->name('edit.profile');

Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
