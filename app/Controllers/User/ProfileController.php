<?php

namespace App\Controllers\User;

use Framework\View;
use App\Models\User;
use App\Models\Tweet;
use App\Helpers\Traits;
use App\Services\Request;
use App\Models\Followers;
use Framework\Controller;

class ProfileController extends Controller
{
    public function index(string $username)
    {
        $user = (new User())->getByLogin($username);

        if ($_POST) {
            $_POST['data']['user_id'] = $user['id'];
            $_POST['data']['date_changed'] = time();
            $_POST['data']['date_updated'] = time();

            (new Tweet())->create($_POST['data']);

            Traits::redirect('/profile/' . $username);
        }

        $sbLink = '';
        $blName = '';
        $actualUser = (new User())->getByLogin($_SESSION['login']);
        $following = (new Followers())->getByFollowerAndFollowing($user['id'], $actualUser['id']);
        $tweets = (new Tweet())->findAllTweetsByUser($user['id']);

        if ($following) {
            $blName = 'Unfollow';
        }

        if ($_SESSION['login'] !== $username) {
            $sbLink = '/subscribe/' . $user['login'];
        }

        View::render('profile', [
            'pageTitle' => $username . ' profile page',
            'user' => $user,
            'subscribeLink' => $sbLink,
            'linkN' => $blName,
            'tweets' => $tweets
        ]);
    }

    public function subscribe(string $username)
    {
        $user = (new User())->getByLogin($username);
        $subscriber = (new User())->getByLogin($_SESSION['login']);
        $following = (new Followers())->getByFollowerAndFollowing($user['id'], $subscriber['id']);

        if (!$following) {
            (new Followers())->create([
                'user_id' => $user['id'],
                'follows_user_id' => $subscriber['id']
            ], 1);

            Traits::redirect('/profile/' . $username);
        }

        (new Followers())->drop([
            'user_id' => $user['id'],
            'follows_user_id' => $subscriber['id']
        ]);

        Traits::redirect('/profile/' . $username);
    }

    public function settings(string $username)
    {
        if (Request::type() == 'POST') {
            $item = (new User())->getById($_SESSION['uid']);

            if ($_FILES['avatar']['name'] != "") {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/avatars/';
                $uploadFile = basename('avatar' . time()) . '.' . pathinfo($_FILES['avatar']['name'])['extension'];
                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadDir . $uploadFile);
                $_POST['avatar'] = '/avatars/' . $uploadFile;
                $_SESSION['avatar'] = $_POST['avatar'];
            }

            if ($_POST['password'] != '') {
                $_POST['password'] = User::hashPassword($_POST['password']);
            }

            (new User())->update($_SESSION['uid'], $_POST, $item);
            $_SESSION['name'] = $item['name'];
            $_SESSION['login'] = $item['login'];
        }

        View::render('settings', [
            'data' => (new User())->getById($_SESSION['uid']),
        ]);
    }
}