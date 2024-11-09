<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AzsController;

// Головна сторінка
Route::get('/', function () {
    return redirect()->route('azs.index');
});

// Маршрути для CRUD операцій
Route::resource('azs', AzsController::class);

// Маршрут для перевірки пального
Route::get('azs/check-fuel', [AzsController::class, 'checkFuel'])->name('azs.check');
