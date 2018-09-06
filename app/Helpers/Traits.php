<?php

namespace App\Helpers;

/**
 * Class Traits
 *
 * @package App\Helpers
 */
class Traits
{
    /**
     * @param string $location
     */
    public static function redirect(string $location)
    {
        header("Location: " . $location);
        die();
    }
}