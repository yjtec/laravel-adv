<?php

namespace Yjtec\Adv\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/seeds' => database_path('seeds')
        ],'seeder');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register(){
        $this->app->singleton('adv',function($app){
            return new \Yjtec\Adv\Adv();
        });
    }

}
