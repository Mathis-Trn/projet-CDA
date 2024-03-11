<?php

use App\Http\Controllers\Api\Book\BookController;
use App\Http\Controllers\Api\User\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', BookController::class);

Route::get('users', IndexController::class);
