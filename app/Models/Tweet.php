<?php

namespace App\Models;

use Framework\Model;

/**
 * Class Tweet
 *
 * @package App\Models
 */
class Tweet extends Model
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'tweets';
    }
}