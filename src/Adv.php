<?php
namespace Yjtec\Adv;
use Route;
class Adv
{
    public function routes(){
        Route::get('/adv','\Yjtec\Adv\Controllers\IndexController@search');
        Route::post('/adv','\Yjtec\Adv\Controllers\IndexController@store');
        Route::get('/adv/{adv}','\Yjtec\Adv\Controllers\IndexController@show');
        Route::put('/adv/{adv}','\Yjtec\Adv\Controllers\IndexController@update');
        Route::put('/adv/{adv}/{operator}','\Yjtec\Adv\Controllers\IndexController@operator');


        Route::get('/adv_type/','\Yjtec\Adv\Controllers\TypeController@index');
        Route::get('/adv_platform/','\Yjtec\Adv\Controllers\PlatformController@index');
    }
    
}
