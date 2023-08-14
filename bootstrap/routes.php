<?php

use SimpleApi\Middlewares\SimpleApiJwtMiddleware;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/api'], function () {
    SimpleRouter::group(['prefix' => '/welcome'], function () {
        SimpleRouter::get('/', 'WelcomeController@index');
        SimpleRouter::get('/{id}', 'WelcomeController@show');
        SimpleRouter::post('/', 'WelcomeController@store',['middleware' => SimpleApiJwtMiddleware::class]);
    });

    SimpleRouter::group(['prefix' => '/auth'], function () {
        SimpleRouter::post('/signin', 'AuthController@signin');
    });
});