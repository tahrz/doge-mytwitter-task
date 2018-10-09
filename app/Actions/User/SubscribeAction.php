<?php

namespace App\Actions\User;

use Framework\Action;
use App\Helpers\Traits;
use App\Models\Follower;
use App\Repository\UserRepository;
use App\Repository\FollowerRepository;

/**
 * Class SubscribeAction
 *
 * @package App\Actions\User
 */
class SubscribeAction extends Action
{
    /**
     * @param string $subscriptionLogin
     * @throws \Exception
     */
    public function __invoke(string $subscriptionLogin)
    {
        $user = UserRepository::findByLogin($subscriptionLogin);
        $subscriber = UserRepository::findByLogin($this->session->get('login'));
        $following = FollowerRepository::findBySubscriptionAndSubscriber($user['id'], $subscriber['id']);
        $this->addSubscriptionCheck($following, $user['id'], $subscriber['id']);
        $this->removeSubscriptionCheck($following, $user['id'], $subscriber['id']);
        Traits::redirect('/profile/' . $subscriptionLogin);
    }

    /**
     * @param Follower|null $following
     * @param int $subscriber
     * @param int $subscription
     */
    private function addSubscriptionCheck(?Follower $following, int $subscriber, int $subscription): void
    {
        if (!$following) {
            FollowerRepository::addSubscription($subscriber, $subscription);
        }
    }

    /**
     * @param Follower|null $following
     * @param int $subscriber
     * @param int $subscription
     * @throws \Exception
     */
    private function removeSubscriptionCheck(?Follower $following, int $subscriber, int $subscription): void
    {
        if ($following) {
            FollowerRepository::removeSubscription($subscriber, $subscription);
        }
    }
}