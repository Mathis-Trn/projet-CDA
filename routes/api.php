<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Book\BookController;
use App\Http\Controllers\Api\User\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//--- BOOK ---//
Route::apiResource('books', BookController::class);

Route::get('users', IndexController::class);

//--- AUTH ---//
Route::post('/inscription', [AuthController::class, 'register']);
Route::post('/connexion', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/deconnexion', [AuthController::class, 'logout']);