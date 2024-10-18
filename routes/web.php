<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EventsPage;
use App\Livewire\VenuesPage;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
Route::get('/events', EventsPage::class)
    ->middleware(['auth', 'verified'])
    ->name('events');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/venues', VenuesPage::class)
    ->middleware(['auth', 'verified'])
    ->name('venues');

Route::redirect('/admin/login', '/login');


require __DIR__.'/auth.php';