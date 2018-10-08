<?php

namespace App\Actions\User;

use Framework\View;
use Framework\Action;
use App\Repository\UserRepository;

/**
 * Class ShowAction
 *
 * @package App\Actions\User
 */
class ShowAction extends Action
{
    public function __invoke(string $login)
    {
        $user = $this->checkOnUserExits($login);
        View::render('profile', [
            'user' => $user,
            'tweets' => $user->tweets,
            'pageTitle' => 'Profile - '. $user->getAttribute('login'),
        ]);
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