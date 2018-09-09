<?php

namespace App\Controllers\Auth;

use Framework\View;
use App\Models\User;
use App\Helpers\Traits;
use App\Services\Request;
use App\Repository\UserRepository;

class LoginController
{
    public function index()
    {
        if (Request::type() != 'POST') {
            View::render('login');
        }

        if (!UserRepository::auth($_POST['email'], $_POST['password'])) {
            View::render('login', ['error' => 'invalid email or password']);
        }

        if (!isset($_SESSION['role'])) {
            $user = (new User())->getByEmail($_POST['email']);
            $_SESSION['role'] = 'USER';
            $_SESSION['avatar'] = $user['avatar'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['login'] = $user['login'];
        }

        Traits::redirect('/feed');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        Traits::redirect('/login');
    }

    public function forgotPassword()
    {
        View::render('forgot-password');
    }
}