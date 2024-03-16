<?php

use App\Http\Controllers\Api\Authors\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Books\BookController;
use App\Http\Controllers\Api\Editors\EditorController;
use App\Http\Controllers\Api\User\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//--- BOOK ---//
Route::get('/', [BookController::class, 'index']);
Route::get('/book/{book}', [BookController::class, 'show']);
Route::post('/create-book', [BookController::class,'store']);
Route::put('/edit-book/{book}', [BookController::class, 'update']);
Route::delete('/book/{book}', [BookController::class, 'destroy']);

//--- AUTHOR ---//
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/author/{author}', [AuthorController::class,'show']);
Route::post('/create-author', [AuthorController::class,'store']);
Route::put('/edit-author/{author}', [AuthorController::class, 'update']);
Route::delete('/author/{author}', [AuthorController::class, 'destroy']);

//--- EDITOR ---//
Route::get('/editors', [EditorController::class, 'index']);
Route::get('/editor/{editor}', [EditorController::class,'show']);
Route::post('/create-editor', [EditorController::class,'store']);
Route::put('/edit-editor/{editor}', [EditorController::class, 'update']);
Route::delete('/editor/{editor}', [EditorController::class, 'destroy']);

//--- AUTH ---//
Route::post('/inscription', [AuthController::class, 'register']);
Route::post('/connexion', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/deconnexion', [AuthController::class, 'logout']);

Route::get('users', IndexController::class);