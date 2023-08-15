<?php

use Pecee\SimpleRouter\SimpleRouter;
use SimpleApi\Middlewares\SimpleApiJwtMiddleware;

SimpleRouter::group(['prefix' => '/api'], function () {
    SimpleRouter::group(['prefix' => '/welcome'], function () {
        SimpleRouter::get('/', 'WelcomeController@index');
        SimpleRouter::get('/{id}', 'WelcomeController@show');
        SimpleRouter::post('/', 'WelcomeController@store', ['middleware' => SimpleApiJwtMiddleware::class]);
    });

    SimpleRouter::group(['prefix' => '/auth'], function () {
        SimpleRouter::post('/signin', 'AuthController@signin');
    });
});
