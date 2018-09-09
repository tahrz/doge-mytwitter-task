<?php

namespace App\Services;

class Request
{
    public static function type()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

}