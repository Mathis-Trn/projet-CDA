<?php

use App\Http\Controllers\Api\Authors\AuthorController;
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\Books\BookController;
use App\Http\Controllers\Api\Editors\EditorController;
use App\Http\Controllers\Api\User\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//--- BOOK ---//
Route::get('/', [BookController::class, 'index']);
Route::get('/book/{book}', [BookController::class, 'show']);

//--- AUTHOR ---//
Route::get('/author/{author}', [AuthorController::class,'show']);

//--- EDITOR ---//
Route::get('/editor/{editor}', [EditorController::class,'show']);

//--- AUTH ---//
Route::post('/inscription', [AuthController::class, 'register']);
Route::post('/connexion', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/deconnexion', [AuthController::class, 'logout']);

Route::get('users', IndexController::class);

Route::middleware(['auth:sanctum', 'checkUserRole'])->group(function() {

    //--- BOOK ---//

    Route::post('/book/create', [BookController::class,'store']);
    Route::put('/book/edit/{book}', [BookController::class, 'update']);
    Route::delete('/book/{book}', [BookController::class, 'destroy']);

    //--- AUTHOR ---//

    Route::get('/authors', [AuthorController::class, 'index']);
    Route::post('/author/create', [AuthorController::class,'store']);
    Route::put('/author/edit/{author}', [AuthorController::class, 'update']);
    Route::delete('/author/{author}', [AuthorController::class, 'destroy']);

    //--- EDITOR ---//

    Route::get('/editors', [EditorController::class, 'index']);
    Route::post('/editor/create', [EditorController::class,'store']);
    Route::put('/editor/edit{editor}', [EditorController::class, 'update']);
    Route::delete('/editor/{editor}', [EditorController::class, 'destroy']);

    //--- USER ---//

    Route::get('/user', function(Request $request) {
        return $request->user();
    });
});