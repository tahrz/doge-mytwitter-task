<?php

namespace App\Repository;

use App\Models\Tweet;

/**
 * Class TweetRepository
 *
 * @package App\Repository
 */
class TweetRepository
{
    /**
     * @param int $userId
     * @param string $content
     * @return Tweet|null
     */
    public static function addNew(int $userId, string $content): ?Tweet
    {
        return Tweet::create([
            'user_id' => $userId,
            'content' => $content
        ]);
    }
}