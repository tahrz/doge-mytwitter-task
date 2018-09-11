<?php

namespace App\Models;

use PDO;
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

    public function findAllTweetsByUser(int $uid)
    {
        $dm = [];
        $followers = (new Followers())->getMyFollows($_SESSION['login']);
        $query_search = (new Tweet())->con->prepare(" SELECT content, date_changed, name, avatar, login
        FROM tweets as T INNER JOIN users as U ON T.user_id = U.id AND U.id = " . $uid . " ORDER BY T.date_updated DESC");
        $query_search->execute();
        $dm = $query_search->fetchAll(PDO::FETCH_ASSOC);

        if ($followers) {
            foreach ($followers as $key => $value) {
                if ($key == 'user_id') {
                    $query_search = (new Tweet())->con->prepare(" SELECT content, date_changed, name, avatar, login
        FROM tweets as T INNER JOIN users as U ON T.user_id = U.id AND U.id = " . $value . " ORDER BY T.date_updated git ");
                    $query_search->execute();
                    $dm2 = $query_search->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($dm2 as $d) {
                        $dm[] = $d;
                    }
                }
            }
        }

        return $dm;
    }

    public function findAllTweets()
    {
        $query_search = (new Tweet())->con->prepare(" SELECT content, date_changed, name, avatar, login
        FROM tweets as T INNER JOIN users as U ON T.user_id = U.id ORDER BY T.date_updated DESC");
        $query_search->execute();

        return $query_search->fetchAll();
    }
}