<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EventsPage;
use App\Livewire\VenuesPage;
use App\Livewire\SpeakersPage;
use App\Livewire\SettingsPage;
use App\Livewire\EventDetailsPage;
use App\Http\Controllers\Auth\GoogleController;
use Laravel\Socialite\Facades\Socialite;
use App\Livewire\AdminDashboard;

Route::view('/', 'livewire.pages.welcome')->name('welcome');

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

Route::get('/events/{event}', EventDetailsPage::class)
    ->middleware(['auth', 'verified'])
    ->name('event.details');

Route::middleware('guest')->group(function () {
    Route::get('/auth/google/redirect', function () {
        return Socialite::driver('google')->redirect();
    })->name('auth.google');

    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});


require __DIR__ . '/auth.php';