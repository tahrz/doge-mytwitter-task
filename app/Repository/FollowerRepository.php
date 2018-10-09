<?php

namespace App\Repository;

use App\Models\Follower;

/**
 * Class FollowerRepository
 *
 * @package App\Repository
 */
class FollowerRepository
{
    /**
     * @param int $subscription
     * @param int $subscriber
     * @return Follower|null
     */
    public static function findBySubscriptionAndSubscriber(int $subscriber, int $subscription): ?Follower
    {
        return Follower::where([
            'subscriber_id' => $subscriber,
            'subscription_id' => $subscription
        ])->first();
    }

    /**
     * @param int $subscription
     * @param int $subscriber
     * @return Follower|null
     */
    public static function addSubscription(int $subscriber, int $subscription): ?Follower
    {
        return Follower::create([
            'subscriber_id' => $subscriber,
            'subscription_id' => $subscription
        ]);
    }

    /**
     * @param int $subscriber
     * @param int $subscription
     * @throws \Exception
     */
    public static function removeSubscription(int $subscriber, int $subscription): void
    {
        static::findBySubscriptionAndSubscriber($subscriber, $subscription)->delete();
    }

    /**
     * @param string $subscriber
     * @param string $subscription
     * @return bool
     */
    public static function isFriendsByLogin(string $subscriber, string $subscription): bool
    {
        $subscriber = UserRepository::findByLogin($subscriber)->getAttribute('id');
        $subscription = UserRepository::findByLogin($subscription)->getAttribute('id');

        return Follower::where([
            'subscriber_id' => $subscription,
            'subscription_id' => $subscriber
        ])->get()->isEmpty();
    }
}