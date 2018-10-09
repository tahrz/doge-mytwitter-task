<?php

namespace App\Actions\User;

use App\Repository\UserRepository;
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
        View::render('settings', ['data' => UserRepository::findByLogin($this->session->get('login'))]);
    }
}