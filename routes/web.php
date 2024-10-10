<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserEventController;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('events', 'events')
    ->middleware(['auth', 'verified'])
    ->name('events.view');

Route::get('/events', [UserEventController::class, 'showEvents'])
    ->middleware(['auth', 'verified'])
    ->name('events');
    
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
Route::redirect('/admin/login', '/login');


require __DIR__.'/auth.php';