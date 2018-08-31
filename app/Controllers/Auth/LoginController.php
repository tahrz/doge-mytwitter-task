<?php

namespace App\Controllers\Auth;

use Framework\View;

class LoginController
{
    public function index()
    {
        View::render('login', [
            'pageTitle' => 'Login to your account',
        ]);
    }

    public function register()
    {
        View::render('register', [
            'pageTitle' => 'Registration page',
        ]);
    }

    public function forgotPassword()
    {
        View::render('forgot-password', [
            'pageTitle' => 'Forgot password',
        ]);
    }
}