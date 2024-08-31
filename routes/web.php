<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserEventController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard', [UserEventController::class, 'showRegisteredEvents'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
Route::redirect('/admin/login', '/login');


require __DIR__.'/auth.php';