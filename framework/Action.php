<?php

namespace Framework;

use App\Helpers\Traits;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Action
 *
 * @package Framework
 */
class Action
{
    /**
     * @var Request
     */
    public $request;
    public $rules = [];
    public $myRole = 'GUEST';

    /**
     * Action constructor.
     */
    public function __construct()
    {
        if (!isset($_SESSION['role'])) {
            Traits::redirect('/login');
        }

        $this->request = Request::createFromGlobals();
    }
}