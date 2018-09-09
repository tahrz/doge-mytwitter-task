<?php

namespace App\Models;

use PDO;
use Framework\Model;

/**
 * Class User
 *
 * @package App\Models
 */
class User extends Model
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getByEmail(string $email)
    {
        $statement = $this->con->prepare('SELECT * FROM ' . static::tableName() . ' WHERE email = :email');
        $statement->execute([':email' => $email]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getByLogin(string $login)
    {
        $statement = $this->con->prepare('SELECT * FROM ' . static::tableName() . ' WHERE login = :login');
        $statement->execute([':login' => $login]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $password
     * @return string
     */
    public static function hashPassword(string $password): string
    {
        return md5($password);
    }
}