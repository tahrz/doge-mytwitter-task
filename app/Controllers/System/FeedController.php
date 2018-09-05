<?php

namespace App\Controllers\System;

use Framework\View;
use App\Models\Tweet;
use App\Helpers\Permission;

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

        $tweets = Tweet::findAll();
        View::render('feed', ['tweets' => $tweets]);
    }

    public function create()
    {
        if (!Permission::canI($this->myRole, $this->rules, __FUNCTION__)) {
            View::render('error', [
                'message' => 'You can`t create tweets. Sign up or sign in!',
                'code' => 403
            ]);
        }

        //form validation need here
        dd($_POST['data']);

        //Tweet::createNewTweet();
        //View::render('feed', ['tweets' => $tweets]);
    }
}