<?php

namespace App\Actions\Auth;

use Framework\View;
use Framework\Action;
use App\Services\Auth;
use App\Helpers\Traits;
use App\Repository\UserRepository;

class LoginAction extends Action
{
    public function __invoke()
    {
        if (Auth::auth($this->request->get('email'), $this->request->get('password'))) {
            View::render('login', ['error' => 'invalid email or password']);
        }

        if (!isset($_SESSION['login'])) {
            $user = UserRepository::findUserByEmail($this->request->get('email'));
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['login'] = $user['login'];
        }

        Traits::redirect('/feed');
    }
}