<?php

namespace App\Services;

use App\Repository\UserRepository;

/**
 * Class Auth
 *
 * @package App\Services
 */
class Auth
{
    public static function auth(string $email, string $password)
    {
        $user = UserRepository::findUserByEmail($email);

        if (!isset($_SESSION['uid'])) {
            $_SESSION['uid'] = $user['id'];
        }

        if ($user['password'] !== User::hashPassword($password)) {
            return false;
        }

        return true;
    }
}