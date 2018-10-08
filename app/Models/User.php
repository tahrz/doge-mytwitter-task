<?php

namespace App\Models;

use  \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    public $fillable = [
        'email',
        'avatar',
        'about',
        'name',
        'login',
        'password'
    ];

    /**
     * @var array
     */
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

    /**
     * @return HasMany
     */
    public function tweets(): HasMany
    {
        return $this->hasMany(Tweet::class);
    }
}