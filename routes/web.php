<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleEventController;
use Illuminate\Support\Facades\Route;
use Spatie\GoogleCalendar\Event;

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
});

require __DIR__.'/socialstream.php';
