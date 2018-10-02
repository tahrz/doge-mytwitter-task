<?php

namespace App\Actions\Tweets;

use Framework\View;
use App\Models\Tweet;
use Framework\Action;

/**
 * Class ListAction
 *
 * @package App\Actions\Tweets
 */
class ListAction extends Action
{
    public function __invoke()
    {
        View::render('feed', ['tweets' => Tweet::all()]);
    }
}