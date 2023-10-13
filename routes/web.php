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
Route::get('/', function () {
    return view('index', [
        'heading' => "Latest Jobs",
        'job' => Job::all()
    ]);
});
// Single job
Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::find($id),
    ]);

});
