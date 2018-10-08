<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Tweet
 *
 * @package App\Models
 */
class Tweet extends Model
{
    /**
     * @var string
     */
    public $table = 'tweets';

    /**
     * @var array
     */
    public $fillable = [
        'user_id',
        'content'
    ];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}