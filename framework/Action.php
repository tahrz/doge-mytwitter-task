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

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    public $session;

    /**
     * @var string
     */
    public $defaultRole = 'GUEST';

    /**
     * Action constructor.
     */
    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->session = (new SystemSession())->getSession();
        $this->guestCheck();
        $this->userCheck();
    }

    private function guestCheck()
    {
        if ($this->session->get('ROLE') !== 'User') {
            if (($this->request->getPathInfo() !== '/registration') && ($this->request->getPathInfo() !== '/login')) {
                Traits::redirect('/login');
            }
        }
    }

    private function userCheck()
    {
        if (($this->session->get('ROLE')) === 'User') {
            if (($this->request->getPathInfo() == '/registration') || ($this->request->getPathInfo() === '/login')) {
                Traits::redirect('/feed');
            }
        }
    }
}