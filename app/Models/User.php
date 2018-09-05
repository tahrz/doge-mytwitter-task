<?php

namespace App\Models;

use framework\Model;

/**
 * Class User
 *
 * @package App\Models
 */
class User extends Model
{
    /**
     * @return array
     */
    public static function getAll(): array
    {
        $stmt = static::db()->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $email
     * @return array
     */
    public static function getByEmail(string $email): array
    {
        $stmt = static::db()->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    /**
     * @param string $password
     * @return string
     */
    protected static function hashPassword(string $password): string
    {
        return hash('sha256', PASS_SALT . $password);
    }
}