<?php

namespace App\Controllers\System;

use App\Models\User;
use Framework\View;
use App\Models\Tweet;
use App\Helpers\Traits;
use App\Helpers\Permission;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Traits\CapsuleManagerTrait;

class FeedController
{
    /**
     * @var array
     */
    private $rules = [];
    private $myRole = 'USER';

    /**
     * FeedController constructor.
     */
    public function __construct()
    {
        $this->rules = [
            'permissions' => [
                'index' => ['GUEST', 'USER'],
                'create' => ['USER'],
                'edit' => ['USER']
            ],
        ];
    }

    public function index()
    {
        if (!Permission::canI($this->myRole, $this->rules, __FUNCTION__)) {
            View::render('error', [
                'message' => 'Permission denied',
                'code' => 403
            ]);
        }

        if ($_POST) {
            $user = (new User())->getByLogin($_SESSION['login']);
            $_POST['data']['user_id'] = $user['id'];
            $_POST['data']['date_changed'] = time();
            $_POST['data']['date_updated'] = time();

            (new Tweet())->create($_POST['data']);

            Traits::redirect('/feed');
        }

        View::render('feed', ['tweets' => Tweet::all()]);
    }
}