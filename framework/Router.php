<?php

namespace Framework;

use Pecee\SimpleRouter\SimpleRouter;

class Router extends SimpleRouter
{
    public static function start(): void
    {
        require_once '../routes/web.php';
        parent::start();
    }
}