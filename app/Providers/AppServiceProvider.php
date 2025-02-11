<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Language;
use Illuminate\Support\Facades\Vite;

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
        Vite::prefetch(concurrency: 3);
        $languages = Language::where('active', 1)->get();
        if (str_contains(Config::get('app.url'), 'https://')) {
            URL::forceScheme('https');
        }
        view()->share('langs', $languages);
    }
}
