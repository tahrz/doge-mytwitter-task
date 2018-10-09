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

    /**
     * @param array $data
     * @return bool
     */
    public static function createNew(array $data): bool
    {
        if (static::isThisEmailAlreadyExists($data['email'])) {
            User::create($data);
            return true;
        }

        return false;
    }

    /**
     * @param string $login
     * @param array $data
     */
    public static function UpdateUser(string $login, array $data): void
    {
        $user = static::findByLogin($login);

        if ($data['name']) {
            $user->name = $data['name'];
        }

        if ($data['email']) {
            $user->email = $data['email'];
        }

        if (isset($data['avatar'])) {
            $user->avatar = $data['avatar'];
        }

        if ($data['password']) {
            $user->password = User::hashPassword($data['password']);
        }

        if ($data['about']) {
            $user->about = $data['about'];
        }

        $user->save();
    }
}