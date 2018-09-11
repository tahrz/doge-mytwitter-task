<?php

namespace App\Models;

use PDO;
use Framework\Model;

/**
 * Class Tweet
 *
 * @package App\Models
 */
class Followers extends Model
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'followers';
    }

    public function getByFollowerAndFollowing(int $following, int $follower)
    {
        $statement = $this->con->prepare('SELECT * FROM ' . static::tableName() . ' WHERE user_id = :user_id AND follows_user_id = :follows_user_id');
        $statement->execute([':user_id' => $following, ':follows_user_id' => $follower]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getMyFollows(string $username)
    {
        $user = (new User())->getByLogin($username);
        $statement = $this->con->prepare('SELECT * FROM ' . static::tableName() . ' WHERE follows_user_id = :follows_user_id');
        $statement->execute([':follows_user_id' => $user['id']]);
        $flws = $statement->fetch(PDO::FETCH_ASSOC);
        return $flws;
    }
}