<?php

namespace App\Contracts;

/**
 * Class ModelInterface
 * @package App\Contracts
 */
interface ModelInterface
{
    /**
     * @return mixed
     */
    public static function tableName();
}