<?php

namespace Codwelt\codliveditor\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class codliveditorProviders extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {

        include __DIR__ . '/../routes.php';
        $this->publishes([__DIR__ . '/../Views/' => resource_path('views/codliveditor'),], 'views-codliveditors');
        $this->publishes([__DIR__ . '/readme.txt' => public_path('codliveditor/pdf/readme.txt'),], 'pdf-codliveditor');
        $this->publishes([__DIR__ . '/../Seeders/' => database_path('seeds/'),], 'seeders-codliveditor');
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations/');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
