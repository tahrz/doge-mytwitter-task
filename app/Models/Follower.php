<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Tweet
 *
 * @package App\Models
 */
class Follower extends Model
{
    public $table = 'followers';
    public $fillable = [
        'subscriber_id',
        'subscription_id'
    ];

    /**
     * @return BelongsToMany
     */
    public function subsciptions(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'subscriber_id', 'subscription_id');
    }

    /**
     * @return BelongsToMany
     */
    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'subscription_id', 'subscriber_id');
    }
}