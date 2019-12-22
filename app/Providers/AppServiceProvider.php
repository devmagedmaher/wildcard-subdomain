<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Settings\SiteSettings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SiteSettings::class, function ($app) {
            
            $host = request()->server->get('HTTP_HOST');

            return new SiteSettings($host);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(SiteSettings $settings)
    {
        View::share('siteName', $settings->get('name'));
    }
}
