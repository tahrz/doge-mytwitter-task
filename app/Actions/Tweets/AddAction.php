<?php

namespace App\Actions\Tweets;

use App\Repository\TweetRepository;
use Framework\Action;
use App\Helpers\Traits;
use App\Repository\UserRepository;

/**
 * Class AddAction
 *
 * @package App\Actions\Tweets
 */
class AddAction extends Action
{
    public function __invoke()
    {
        $user = UserRepository::findByLogin($this->session->get('login'));
        TweetRepository::addNew($user->id, $this->request->get('content'));
        Traits::redirect('/feed');
    }
}