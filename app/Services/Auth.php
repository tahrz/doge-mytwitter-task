<?php

namespace App\Services;

use App\Models\User;
use App\Repository\UserRepository;

/**
 * Class Auth
 *
 * @package App\Services
 */
class Auth
{
    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public static function auth(string $email, string $password): bool
    {
        $user = static::tryFindUserWithEmail($email);

        if ($user['password'] === User::hashPassword($password)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $email
     * @return User|bool|null
     */
    private static function tryFindUserWithEmail(string $email)
    {
        try {
            return UserRepository::findUserByEmail($email);
        } catch (\Exception $exception) {
            return false;
        }
    }
}