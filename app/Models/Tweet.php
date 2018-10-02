<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

/**
 * Class Tweet
 *
 * @package App\Models
 */
class Tweet extends Model
{
    public $table = 'tweets';
    public $fillable = [
        'user_id',
        'content'
    ];
}