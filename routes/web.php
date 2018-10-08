<?php

use Illuminate\Routing\Router;


$router->group(['namespace' => '\App\Actions\User'], function (Router $router) {
    $router->get('/profile/{login}', ShowAction::class);
    $router->post('/profile/{login}', AddTweetAction::class);

    $router->get('/profile/my/settings', SettingsFormAction::class);
    $router->post('/profile/my/settings', SettingsAction::class);
});

/*//$route->group(['namespace' => '\App\Controllers\User'], function () {
//    Router::match(['get', 'post'], '/profile/{login}', 'ProfileController@index');
//    Router::get('/subscribe/{login}', 'ProfileController@subscribe');
//    Router::match(['get', 'post'], '/profile/{login}/settings', 'ProfileController@settings');
//});*/
//
//$route->group(['namespace' => '\App\Controllers'], function () {
//    Router::get('/not-found', 'DefaultController@notFound');
//});

$router->group(['namespace' => '\App\Actions\Auth'], function (Router $router) {
    $router->get('/login', LoginFormAction::class);
    $router->post('/login', LoginAction::class);
    $router->get('/registration', RegistrationFormAction::class);
    $router->post('/registration', RegistrationAction::class);
});
//
//Router::group(['namespace' => '\App\Actions\Auth'], function () {
//    Router::get('/login', 'LoginFormAction');
//    Router::post('/login', 'LoginAction');
//    Router::match(['get'],'/registration', 'RegistrationFormAction');
//    Router::match(['post'],'/registration', 'RegistrationFormAction');
//});
//
$router->group(['namespace' => '\App\Actions\Tweets'], function (Router $router) {
    $router->get('/feed', ListAction::class);
    $router->post('/feed', AddAction::class);
});

$router->get('/logout', function () {
    (new \Framework\SystemSession())->getSession()->clear();
    \App\Helpers\Traits::redirect('/login');
});

//Router::error(function () {
//    Router::response()->redirect('/not-found');
//});