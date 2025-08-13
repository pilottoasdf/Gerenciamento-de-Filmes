<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filmes', [FilmeController::class, 'showFilmes'])->middleware(['auth', 'verified'])->name('filmes');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/filmes/admin', [FilmeController::class, 'admin'])->name('filmes.admin');
    Route::get('/filmes/create', [FilmeController::class, 'create'])->name('filme.create');
    Route::post('/filmes/store', [FilmeController::class, 'store'])->name('filme.store');

    Route::delete('/filmes/{id}', [FilmeController::class, 'destroy'])->name('filme.destroy');
    Route::get('/filmes/edit/{id}', [FilmeController::class, 'edit'])->name('filme.edit');
    Route::put('/filmes/{id}', [FilmeController::class, 'update'])->name('filme.update');
});



require __DIR__.'/auth.php';
