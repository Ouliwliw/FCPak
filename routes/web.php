<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('events', \App\Http\Controllers\EventController::class);
    Route::get('refetch-events', '\App\Http\Controllers\EventController@refetchEvents')->name('refetch-events');
    Route::put('events/{id}/resize', '\App\Http\Controllers\EventController@resizeEvent')->name('resize-event');
});

require __DIR__.'/auth.php';
