<?php

namespace App\Actions\Auth;

use Framework\View;
use Framework\Action;

class LoginFormAction extends Action
{
    public function __invoke()
    {
        View::render('login');
    }
}