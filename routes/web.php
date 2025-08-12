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

    Route::get('/filmes/info/{id}', [FilmeController::class, 'info'])->name('filme.info');

});



require __DIR__.'/auth.php';
