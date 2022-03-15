<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;

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

Route::POST('/signup', [AuthController::class, 'signup']);
Route::POST('/login', [AuthController::class, 'login']);
Route::POST('/add_experience', [ProfileController::class, 'addExperience'])->middleware('auth:sanctum');
Route::POST('/add_education', [ProfileController::class, 'addEducation'])->middleware('auth:sanctum');
Route::POST('/add_skill', [profileController::class, 'addSkill'])->middleware('auth:sanctum');
Route::POST('/get_experience', [ProfileController::class, 'getExperience'])->middleware('auth:sanctum');
Route::POST('/get_education', [ProfileController::class, 'getEducation'])->middleware('auth:sanctum');
Route::POST('/get_skill', [profileController::class, 'getSkill'])->middleware('auth:sanctum');
