<?php

namespace Yjtec\Adv\Facades;
use Illuminate\Support\Facades\Facade;
class Adv extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'adv';
    }

    /**
     * Register the typical authentication routes for an application.
     *
     * @return void
     */
    public static function routes()
    {
        static::$app->make('adv')->routes();
    }
}
