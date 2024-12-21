<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $quote = Inspiring::quote();
    $this->info('💡 Inspiration: ' . $quote);
    \Log::info('Quote delivered: ' . $quote);
})->purpose('Display an inspiring quote')->everyFiveMinutes();

