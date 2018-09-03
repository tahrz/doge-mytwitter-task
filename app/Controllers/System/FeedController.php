<?php

namespace App\Controllers\System;

use Framework\View;

class FeedController
{
    public function index()
    {
        View::render('feed');
    }
}