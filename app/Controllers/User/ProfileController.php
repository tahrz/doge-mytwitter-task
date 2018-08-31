<?php

namespace App\Controllers\User;

use Framework\View;

class ProfileController
{
    public function index(string $username)
    {
        View::render('profile', [
            'pageTitle' => $username . ' profile page',
        ]);
    }

    public function settings(string $username)
    {
        View::render('settings', [
            'pageTitle' => $username . ' settings',
        ]);
    }
}