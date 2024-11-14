<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AzsController;

// Оновлення маршрутів у web.php:

Route::get('/azs/create', [AzsController::class, 'create'])->name('azs.create');
Route::get('/azs/{id}', [AzsController::class, 'show'])->name('azs.show');
Route::get('/azs/{id}/edit', [AzsController::class, 'edit'])->name('azs.edit');
Route::delete('/azs/{id}', [AzsController::class, 'destroy'])->name('azs.destroy');


// Головна сторінка
Route::get('/', function () {
    $azs = \App\Models\Azs::all();
    return view('azs.index', compact('azs'));
});


Route::get('/', function () {
    $azs = \App\Models\Azs::all();
    return view('azs.index', compact('azs'));
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
