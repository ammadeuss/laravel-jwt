<?php

namespace Ammadeuss\LaravelJwt;

use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\ValidationData;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Jwt', function ($app) {
            return new Configuration;
        });
        $this->app->bind('JwtValidation', function ($app) {
            return new ValidationData;
        });
    }
}
