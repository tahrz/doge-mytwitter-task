<?php

/**
 * @param $var
 */
function dd($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';

    die();
}