<?php

namespace App\Controllers\User;

use Framework\Controller;
use Imagick;
use Framework\View;
use App\Models\User;
use Bulletproof\Image;
use App\Services\Request;

class ProfileController extends Controller
{
    public function index(string $username)
    {
        View::render('profile', [
            'pageTitle' => $username . ' profile page',
        ]);
    }

    public function settings(string $username)
    {
        if (Request::type() == 'POST') {
            $item = (new User())->getById($_SESSION['uid']);

            if ($_FILES) {
                $avaName = '/avatars'. 'avatar' . time();
                $image = new Image($_FILES);
                $image->setName($avaName)
                    ->setLocation($_SERVER['DOCUMENT_ROOT']);
                $image->upload();
                $_POST['avatar'] = $avaName;
            }

            if ($_POST['password'] != '') {
                $_POST['password'] = User::hashPassword($_POST['password']);
            }

            (new User())->update($_SESSION['uid'], $_POST, $item);
        }

        View::render('settings', [
            'data' => (new User())->getById($_SESSION['uid']),
        ]);
    }
}