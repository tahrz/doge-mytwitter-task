<?php

use Illuminate\Routing\Router;

$router->group(['namespace' => '\App\Actions\User'], function (Router $router) {
    $router->get('/profile/{login}', ShowAction::class);
    $router->post('/profile/{login}', AddTweetAction::class);
    $router->get('/profile/my/settings', SettingsFormAction::class);
    $router->post('/profile/my/settings', SettingsAction::class);
    $router->get('/subscribe/{login}', SubscribeAction::class);
});

$router->group(['namespace' => '\App\Actions\Auth'], function (Router $router) {
    $router->get('/login', LoginFormAction::class);
    $router->post('/login', LoginAction::class);
    $router->get('/registration', RegistrationFormAction::class);
    $router->post('/registration', RegistrationAction::class);
});

$router->group(['namespace' => '\App\Actions\Tweets'], function (Router $router) {
    $router->get('/feed', ListAction::class);
    $router->post('/feed', AddAction::class);
});

$router->get('/logout', function () {
    (new \Framework\SystemSession())->getSession()->clear();
    \App\Helpers\Traits::redirect('/login');
});