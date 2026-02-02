<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Baris ini ditambahkan untuk memperbaiki error

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }  

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Memaksa semua asset (CSS/JS) menggunakan HTTPS jika di server production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}