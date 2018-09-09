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
     * @param array $data
     * @return bool
     */
    public function createNewUser(array $data): bool
    {
        if ((new User())->getByEmail($data['email']) || (new User())->getByLogin($data['login'])) {
            return false;
        }

        (new User())->create($data);

        return true;
    }

    public static function auth(string $email, string $password)
    {
        $user = (new User())->getByEmail($email);

        if (!$user) {
            return false;
        }

        if (!isset($_SESSION['uid'])) {
            $_SESSION['uid'] = $user['id'];
        }

        if ($user['password'] != User::hashPassword($password)) {
            return false;
        }

        return true;
    }
}