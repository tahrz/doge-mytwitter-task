<?php

namespace App\Repository;

use App\Models\User;

/**
 * Class UserRepository
 *
 * @package App\Repository
 */
class UserRepository
{
    /**
     * @param string $login
     * @return User|null
     */
    public static function findByLogin(string $login): ?User
    {
        return User::where(['login' => $login])->firstOrFail();
    }

    /**
     * @param string $email
     * @return mixed
     */
    public static function isThisEmailAlreadyExists(string $email)
    {
        return User::where(['email' => $email])->get()->isEmpty();
    }

    /**
     * @param string $email
     * @return User|null
     */
    public static function findUserByEmail(string $email): ?User
    {
        return User::where(['email' => $email])->firstOrFail();
    }
}