<?php

namespace Framework;

class View
{
    public static function render($file, $args = [])
    {
        extract($args, EXTR_SKIP);
        $view = dirname(__DIR__) . "/app/Views/$file.php";

        if (is_readable($view)) {
            require $view;
        }
    }
}