<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/genres')->group(function () {
    Route::get('/', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/create', [GenreController::class, 'create'])->name('genres.create');
    Route::get('/{id}', [GenreController::class, 'show'])->name('genres.show'); 
    Route::post('/', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/{id}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('/{id}', [GenreController::class, 'delete'])->name('genres.delete');
});

Route::prefix('admin/movies')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
    Route::get('/{id}', [MovieController::class, 'show'])->name('movies.show'); 
    Route::post('/', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/{id}', [MovieController::class, 'delete'])->name('movies.delete');
    Route::post('/{id}/publish', [MovieController::class, 'publish'])->name('movies.publish');
});
