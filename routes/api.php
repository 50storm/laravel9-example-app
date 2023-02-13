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

// SanctumでTokenの発行
// curl -X POST -d "email=yoko28@example.com&password=password"  http://localhost/api/tokens/create | jq
Route::post('/tokens/create', \App\Http\Controllers\PostSanctumTokenController::class);

// Postmanで作業するときは、Authorization→Bearerを選んでaccessTokenの文字列をセットする
// curl -X GET http://localhost/api/users -H 'Authorization: Bearer トークンの値' | jq
Route::middleware('auth:sanctum')->group(function() {
  Route::get('/users', GetAllUsersController::class);
  Route::get('/user/{id}', GetUserController::class);
  Route::post('/user/create', CreateUserController::class);
  Route::put('/user/update', UpdateUserController::class);  
});