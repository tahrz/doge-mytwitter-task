<?php

namespace App\Controllers\Auth;

use Framework\View;

class LoginController
{
    public function index()
    {
        View::render('login');
    }

    public function register()
    {
        View::render('register');
    }

    public function forgotPassword()
    {
        View::render('forgot-password');
    }
}