<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('index'); })->name('index');
Route::get('/book/{book}', function () { return view('index'); });

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/books', function () { return view('index'); })->name('books');
    Route::get('/book/edit/{book}', function () { return view('index'); });
    Route::get('/book/create', function () { return view('index'); });
    Route::get('/authors', function () { return view('index'); })->name('authors');
    Route::get('/author/edit/{author}', function () { return view('index'); });
    Route::get('/author/create', function () { return view('index'); });
    Route::get('/editors', function () { return view('index'); })->name('editors');
    Route::get('/editor/edit/{editor}', function () { return view('index'); });
    Route::get('/editor/create', function () { return view('index'); });
    Route::get('/users', function () { return view('index'); })->name('users');
    Route::get('/user/edit/{user}', function () { return view('index'); });
    Route::get('/user/create', function () { return view('index'); });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
