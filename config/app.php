<?php

use Symfony\Component\Yaml\Yaml;

$env = 'development';

/**
 * Database
 */
define('DB_HOST',  Yaml::parseFile('../phinx.yml')['environments'][$env]['host']);
define('DB_NAME', Yaml::parseFile('../phinx.yml')['environments'][$env]['name']);
define('DB_USER', Yaml::parseFile('../phinx.yml')['environments'][$env]['user']);
define('DB_PASS', Yaml::parseFile('../phinx.yml')['environments'][$env]['pass']);

/**
 * Links
 */
define('APP_DOMAIN', 'localhost:8000');