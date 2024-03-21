<?php

use App\Http\Controllers\Api\Authors\AuthorController;
use App\Http\Controllers\Api\Books\BookController;
use App\Http\Controllers\Api\Editors\EditorController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Support\Facades\Route;

//--- BOOK ---//
Route::get('/books', [BookController::class, 'index']);
Route::get('/recherche', [BookController::class, 'index']);
Route::get('/book/{book}', [BookController::class, 'show']);

//--- AUTHOR ---//
Route::get('/author/{author}', [AuthorController::class,'show']);

//--- EDITOR ---//
Route::get('/editor/{editor}', [EditorController::class,'show']);

// Route::middleware(['auth:sanctum', 'checkUserRole'])->group(function() {

    //--- BOOK ---//

    Route::post('/book/create', [BookController::class,'store']);
    Route::put('/book/edit/{book}', [BookController::class, 'update']);
    Route::delete('/book/delete/{book}', [BookController::class, 'destroy']);

    //--- AUTHOR ---//

    Route::get('/authors', [AuthorController::class, 'index']);
    Route::post('/author/create', [AuthorController::class,'store']);
    Route::put('/author/edit/{author}', [AuthorController::class, 'update']);
    Route::delete('/author/delete/{author}', [AuthorController::class, 'destroy']);

    //--- EDITOR ---//

    Route::get('/editors', [EditorController::class, 'index']);
    Route::post('/editor/create', [EditorController::class,'store']);
    Route::put('/editor/edit{editor}', [EditorController::class, 'update']);
    Route::delete('/editor/delete/{editor}', [EditorController::class, 'destroy']);

    //--- USER ---//

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{user}', [UserController::class,'show']);
    Route::post('/user/create', [UserController::class,'store']);
    Route::put('/user/edit/{user}', [UserController::class, 'update']);
    Route::delete('/user/delete/{user}', [UserController::class, 'destroy']);
// });