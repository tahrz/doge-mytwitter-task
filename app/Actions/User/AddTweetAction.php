<?php

namespace App\Actions\User;

use Framework\View;
use Framework\Action;
use App\Repository\UserRepository;

/**
 * Class AddTweetAction
 *
 * @package App\Actions\User
 */
class AddTweetAction extends Action
{
    public function __invoke(string $login)
    {
        $this->checkOnUserExits($login);

        if ($login !== $this->session->get('login')) {
            View::render('error', [
                'code' => 403,
                'message' => 'You don`t have permission!'
            ]);
        }
    }

    /**
     * @param string $login
     * @return \App\Models\User|null
     */
    private function checkOnUserExits(string $login)
    {
        try {
            return UserRepository::findByLogin($login);
        } catch (\Exception $exception) {
            View::render('error', [
                'code' => 404,
                'message' => 'User not found!'
            ]);
        }
    }
}