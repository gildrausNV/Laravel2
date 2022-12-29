<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthController2;
use App\Http\Controllers\MountainSlopeController;
use App\Http\Controllers\SlopeController;
use App\Http\Controllers\UserController;
use App\Models\Mountain;
use App\Models\SkiSlope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('slopes/{id}', [SlopeController::class, 'show']);
//Route::get('slopes', [SlopeController::class, 'index']);

//Route::resource('slopes', SlopeController::class);

Route::get('/mountains/{id}/slopes', [MountainSlopesController::class, 'index'])->name('mountains.slopes.index');

Route::get('users', [UserController::class, 'index']);

Route::get('users/{id}', [UserController::class, 'show']);

Route::post('/register', [AuthController2::class, 'register']);

Route::post('/login', [AuthController2::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    }
    );
    Route::resource('slopes', SlopeController::class)->only(['update', 'store', 'destroy']);

    Route::post('/logout', [AuthController2::class, 'logout']);
});

Route::resource('slopes', SlopeController::class)->only(['index']);
