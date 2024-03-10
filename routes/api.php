<?php

use App\Http\Controllers\Api\User\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('users', IndexController::class)->name('user');
