<?php

namespace App\Actions\Auth;

use Framework\View;
use Framework\Action;

/**
 * Class LoginFormAction
 *
 * @package App\Actions\Auth
 */
class LoginFormAction extends Action
{
    public function __invoke()
    {
        View::render('login');
    }
}