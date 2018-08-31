<?php

use Framework\Router;
use Pecee\Http\Request;

Router::group(['namespace' => '\App\Controllers\Auth'], function () {
    Router::get('/login', 'LoginController@index');
    Router::get('/registration', 'LoginController@register');
    Router::get('/forgot-password', 'LoginController@register');
});

Router::group(['namespace' => '\App\Controllers\User'], function () {
    Router::get('/profile/{login}', 'ProfileController@index');
    Router::get('/profile/{login}/settings', 'ProfileController@settings');
});

Router::group(['namespace' => '\App\Controllers\System'], function () {
    Router::get('/', 'FeedController@index');
});

Router::group(['namespace' => '\App\Controllers'], function () {
    Router::get('/not-found', 'DefaultController@notFound');
});

Router::error(function (Request $request, \Exception $exception) {
    Router::response()->redirect('/not-found');
});