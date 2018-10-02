<?php

namespace App\Models;

use  \Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @package App\Models
 */
class User extends Model
{
    /**
     * @var string
     */
    public $table = 'users';
    public $timestamps = false;
    public $fillable = [
        'email',
        'avatar',
        'about',
        'name',
        'login'
    ];

    public $hidden = [
        'password'
    ];

    /**
     * @param string $password
     * @return string
     */
    public static function hashPassword(string $password): string
    {
        return md5($password);
    }
}