<?php

namespace App\Actions\Auth;

use Framework\View;
use Framework\Action;

/**
 * Class RegistrationFormAction
 *
 * @package App\Actions\Auth
 */
class RegistrationFormAction extends Action
{
    public function __invoke()
    {
        View::render('register');
    }
}