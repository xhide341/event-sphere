<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EventsPage;
use App\Livewire\VenuesPage;
use App\Livewire\SpeakersPage;
use App\Livewire\SettingsPage;
use App\Livewire\EventShowPage;

Route::view('/', 'livewire.pages.welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
Route::get('/events', EventsPage::class)
    ->middleware(['auth', 'verified'])
    ->name('events');

Route::view('profile', 'livewire.pages.profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/venues', VenuesPage::class)
    ->middleware(['auth', 'verified'])
    ->name('venues');

Route::get('/speakers', SpeakersPage::class)
    ->middleware(['auth', 'verified'])
    ->name('speakers');

Route::get('/settings', SettingsPage::class)
    ->middleware(['auth', 'verified'])
    ->name('settings');

Route::get('/events/{event}',EventShowPage::class)
    ->middleware(['auth', 'verified'])
    ->name('events.show');

Route::get('/debug-storage', function () {
    $path = storage_path('app/public/images/LCUP.png');
    return [
        'file_exists' => file_exists($path),
        'storage_path' => $path,
        'public_link_exists' => file_exists(public_path('storage')),
        'is_link' => is_link(public_path('storage')),
        'target_path' => readlink(public_path('storage')),
        'is_readable' => is_readable($path),
        'full_url' => asset('storage/images/LCUP.png')
    ];
});

Route::get('/debug-favicon', function () {
    $path = storage_path('app/public/images/LCUP.ico');
    return [
        'file_exists' => file_exists($path),
        'is_readable' => is_readable($path),
        'mime_type' => mime_content_type($path),
        'file_size' => filesize($path),
        'full_url' => asset('storage/images/LCUP.ico')
    ];
});

require __DIR__.'/auth.php';