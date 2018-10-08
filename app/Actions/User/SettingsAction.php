<?php

namespace App\Actions\User;

use App\Helpers\Traits;
use App\Repository\UserRepository;
use Framework\Action;

/**
 * Class SettingsAction
 *
 * @package App\Actions\User
 */
class SettingsAction extends Action
{
    public function __invoke()
    {
        UserRepository::UpdateUser($this->session->get('login'), $this->request->request->all());
        Traits::redirect('/profile/'.$this->session->get('login'));
    }
}