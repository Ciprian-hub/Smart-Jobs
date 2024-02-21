 <?php

 use App\Http\Controllers\Api\ApplicationsController;
 use App\Http\Controllers\Api\JobsController;
 use App\Http\Controllers\Api\UsersController;
 use App\Http\Controllers\AuthController;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user' , function (Request $request) {
        return $request->user();
    });
    Route::get('/jobs', [JobsController::class, 'getJobs']);
    Route::get('/users-count', [UsersController::class, 'getUsersType']);
    Route::get('/users', [UsersController::class, 'getUsers']);
    Route::get('/applications', [ApplicationsController::class, 'getApplications']);
});

Route::post('/login', [AuthController::class, 'login']);
