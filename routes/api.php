<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('students', App\Http\Controllers\StudentController::class);
Route::get('students-list', [StudentController::class, 'index']);
Route::get('students-list/{student}', [StudentController::class, 'show']);
Route::put('students-update', [StudentController::class, 'update']);
Route::post('students-delete/{id}', [StudentController::class, 'destroy']);
