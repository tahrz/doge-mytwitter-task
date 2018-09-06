<?php

namespace App\Contracts;

use PDO;

class Connect
{
    public $con;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->con = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        if (!$this->con) {
            echo 'CANNOT CONNECT';
        }
    }

    function query($sql)
    {
        return $this->con->query($sql);
    }

    function fetch($obj)
    {
        if (!$obj) {
            return false;
        }

        $array = $obj->fetch(PDO::FETCH_ASSOC);

        return $array;
    }

    function numRows($obj)
    {
        $result = $obj->rowCount();
        return $result;
    }
}