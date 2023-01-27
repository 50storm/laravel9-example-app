<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\GetAllUsersController;
use App\Http\Controllers\Users\GetUserController;
use App\Http\Controllers\Users\CreateUserController;
use App\Http\Controllers\Users\UpdateUserController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', GetAllUsersController::class);
Route::get('/user/{id}', GetUserController::class);
Route::post('/user/create', CreateUserController::class);
Route::put('/user/update', UpdateUserController::class);

