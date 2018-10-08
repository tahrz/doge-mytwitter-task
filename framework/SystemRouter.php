<?php

namespace Framework;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Redirector;
use Illuminate\Container\Container;
use Illuminate\Routing\UrlGenerator;

class SystemRouter
{
    public static function start(): void
    {
        $container = new Container();
        $request = Request::capture();
        $container->instance(Request::class, $request);
        $events = new Dispatcher($container);
        $router = new Router($events, $container);
        require_once '../routes/web.php';
        $redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));
        $response = $router->dispatch($request);
        $response->send();
    }
}