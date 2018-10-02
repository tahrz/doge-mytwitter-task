<?php

use Framework\Router;

Router::get('/', function () {
    Router::response()->redirect('/login');
});

Router::group(['namespace' => '\App\Controllers\User'], function () {
    Router::match(['get', 'post'], '/profile/{login}', 'ProfileController@index');
    Router::get('/subscribe/{login}', 'ProfileController@subscribe');
    Router::match(['get', 'post'], '/profile/{login}/settings', 'ProfileController@settings');
});

Router::group(['namespace' => '\App\Controllers'], function () {
    Router::get('/not-found', 'DefaultController@notFound');
});

Router::group(['namespace' => '\App\Actions\Auth'], function () {
    Router::get('/login', 'LoginFormAction');
    Router::post('/login', 'LoginAction');
    Router::get('/registration', 'RegistrationFormAction');
    Router::post('/registration', 'RegistrationAction');
});

Router::group(['namespace' => '\App\Actions\Tweets'], function () {
    Router::get('/feed', 'ListAction');
    Router::post('/feed-add', 'AddAction');
});

//Router::error(function () {
//    Router::response()->redirect('/not-found');
//});