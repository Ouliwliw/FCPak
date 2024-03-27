<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleEventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('events', EventController::class);
    Route::get('refetch-events', '\App\Http\Controllers\EventController@refetchEvents')->name('refetch-events');
    Route::put('events/{id}/resize', '\App\Http\Controllers\EventController@resizeEvent')->name('resize-event');

    Route::put('/google-events/create', '\App\Http\Controllers\GoogleEventController@create')->name('google-events.create');
    // Route::delete('/google-events/delete', '\App\Http\Controllers\GoogleEventController@destroy')->name('google-events.delete');
});

require __DIR__.'/socialstream.php';
