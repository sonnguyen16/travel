<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Language;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

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
        // if (str_contains(Config::get('app.url'), 'https://')) {
        //     URL::forceScheme('https');
        // }
        ini_set('upload_max_filesize', '128M');
        ini_set('post_max_size', '130M');
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', '300');
        ini_set('max_input_time', '300');
        view()->share('langs', $languages);
    }
}
