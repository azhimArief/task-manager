<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController; // Make sure this controller exists or create it

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

// Example route to get authenticated user details (optional, but common)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Your TaskController API resources, protected by sanctum authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});
