<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/auth/login', [AuthController::class, 'login'] );

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::apiResource('/categories', CategoryController::class);
});