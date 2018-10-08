<?php

namespace App\Actions\User;

use Framework\Action;
use Framework\View;

/**
 * Class SettingsFormAction
 *
 * @package App\Actions\User
 */
class SettingsFormAction extends Action
{
    public function __invoke()
    {
        View::render('settings');
    }
}