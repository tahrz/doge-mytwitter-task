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

    /**
     * @return mixed
     */
    public function findAllTweets()
    {
        return parent::findAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findTweetById(int $id)
    {
        return parent::findById($id);
    }

    /**
     * @param array $post
     * @return mixed
     */
    public function createNewTweet(array $post)
    {
        return parent::create($post);
    }
}