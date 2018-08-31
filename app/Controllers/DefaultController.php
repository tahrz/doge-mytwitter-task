<?php

namespace App\Controllers;

use Framework\View;

class DefaultController
{
    public function notFound()
    {
        View::render('404', [
            'pageTitle' => 'Page not found',
        ]);
    }
}