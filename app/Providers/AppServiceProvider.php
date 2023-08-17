<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if (Schema::hasTable('settings')) {
            Config::set('mail.mailers.smtp.host', setting('MAIL_HOST', env('MAIL_HOST')));
            Config::set('mail.mailers.smtp.port', setting('MAIL_PORT', env('MAIL_PORT')));
            Config::set('mail.mailers.smtp.encryption', setting('MAIL_ENCRYPTION', env('MAIL_ENCRYPTION')));
            Config::set('mail.mailers.smtp.username', setting('MAIL_USERNAME', env('MAIL_USERNAME')));
            Config::set('mail.mailers.smtp.password', setting('MAIL_PASSWORD', env('MAIL_PASSWORD')));
        }
    }
}
