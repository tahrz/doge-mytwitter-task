<?php

namespace App\Actions\Auth;

use Framework\View;
use Framework\Action;
use App\Services\Auth;
use App\Helpers\Traits;
use App\Repository\UserRepository;

/**
 * Class LoginAction
 *
 * @package App\Actions\Auth
 */
class LoginAction extends Action
{
    public function __invoke()
    {
        $this->authCheck();
        $this->sessionSetter();
        Traits::redirect('/feed');
    }

    private function sessionSetter(): void
    {
        $user = UserRepository::findUserByEmail($this->request->request->get('email'));
        $this->session->set('ROLE', 'User');
        $this->session->set('login', $user->getAttribute('login'));
        $this->session->set('avatar', $user->getAttribute('avatar'));
    }

    private function authCheck()
    {
        if (!Auth::auth($this->request->request->get('email'), $this->request->request->get('password'))) {
            View::render('login', ['error' => 'invalid email or password']);
        }
    }
}