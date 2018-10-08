<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class SystemSession
 *
 * @package Framework
 */
class SystemSession
{
    /**
     * @var Session
     */
    public $session;

    /**
     * SystemSession constructor.
     */
    public function __construct()
    {
        $this->session = new Session();
    }

    public function start()
    {
        $this->session->start();
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }
}