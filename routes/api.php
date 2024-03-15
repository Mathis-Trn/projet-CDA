<?php

use App\Http\Controllers\Api\Authors\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Books\BookController;
use App\Http\Controllers\Api\Editors\EditorController;
use App\Http\Controllers\Api\User\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//--- BOOK ---//
Route::apiResource('books', BookController::class);

//--- AUTHOR ---//
Route::apiResource('authors', AuthorController::class);

//--- EDITOR ---//
Route::apiResource('editors', EditorController::class);

//--- AUTH ---//
Route::post('/inscription', [AuthController::class, 'register']);
Route::post('/connexion', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/deconnexion', [AuthController::class, 'logout']);