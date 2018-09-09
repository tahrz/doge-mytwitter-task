<?php

namespace Framework;

use App\Helpers\Traits;

class Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['role'])) {
            Traits::redirect('/login');
        }
    }
}