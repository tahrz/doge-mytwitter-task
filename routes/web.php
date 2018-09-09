<?php

use Framework\Router;
use Pecee\Http\Request;

Router::get('/', function () {
    Router::response()->redirect('/login');
});

Router::group(['namespace' => '\App\Controllers\Auth'], function () {
    Router::match(['get', 'post'], '/login', 'LoginController@index');
    Router::match(['get', 'post'],'/registration', 'RegistrationController@index');
    Router::get('/logout', 'LoginController@logout');
    Router::get('/forgot-password', 'LoginController@register');
});

Router::group(['namespace' => '\App\Controllers\User'], function () {
    Router::get('/profile/{login}', 'ProfileController@index');
    Router::match(['get', 'post'], '/profile/{login}/settings', 'ProfileController@settings');
});

Router::group(['namespace' => '\App\Controllers\System'], function () {
    Router::get('/feed', 'FeedController@index');
    Router::post('/feed/add', 'FeedController@create');
});

Router::group(['namespace' => '\App\Controllers'], function () {
    Router::get('/not-found', 'DefaultController@notFound');
});

Router::error(function (Request $request, \Exception $exception) {
    Router::response()->redirect('/not-found');
});