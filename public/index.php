<?php

require_once '../vendor/autoload.php';
require_once '../Helper.php';
require_once '../config/app.php';
require_once '../config/ORMcapsule.php';

(new \Framework\SystemSession())->start();
\Framework\SystemRouter::start();
