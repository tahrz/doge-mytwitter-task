<?php

namespace App\Actions\User;

use App\Helpers\Traits;
use Framework\Action;
use App\Repository\UserRepository;
use App\Repository\TweetRepository;

/**
 * Class AddTweetAction
 *
 * @package App\Actions\User
 */
class AddTweetAction extends Action
{
    public function __invoke()
    {
        $user = UserRepository::findByLogin($this->session->get('login'));
        TweetRepository::addNew($user->id, $this->request->get('content'));
        Traits::redirect('/profile/' . $this->session->get('login'));
    }
}