<?php

namespace Framework;

use PDO;
use App\Contracts\ModelInterface;

/**
 * Class Model
 *
 * @package framework
 */
abstract class Model implements ModelInterface
{
    /**
     * @var
     */
    static protected $db;

    /**
     * @return mixed
     */
    protected static function db()
    {
        if (null === static::$db) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            static::$db = new PDO($dsn, DB_USER, DB_PASS);
            // Включаем режим отображения ошибок в PDO
            static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return static::$db;
    }

    /**
     * @return string
     */
    public static function className():string
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id)
    {
        $stmt = static::db()->query('SELECT * FROM ' . static::tableName() . ' WHERE id = ' . $id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public static function findAll()
    {
        $stmt = static::db()->query('SELECT * FROM ' . static::tableName());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public static function create(array $params)
    {
        $vars1 = '';
        $vars2 = '';
        $iterationNum = 0;
        $dumpArray = [];

        foreach ($params as $key => $value) {
            $dumpDot = ', ';

            if ($iterationNum == count($params)) {
                $dumpDot = '';
            }

            $vars1 .= $key . $dumpDot;
            $vars2 .= ':' . $key . $dumpDot;

            array_push($dumpArray, [':' . $key => $value]);
        }

        $sql = 'INSERT INTO users (' . $vars1 . ') 
                VALUES (' . $vars2 . ')';
        $stmt = static::db()->prepare($sql);

        return $stmt->execute($dumpArray);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public static function update(array $params)
    {
        $vars1 = '';
        $vars2 = '';
        $iterationNum = 0;
        $dumpArray = [];

        foreach ($params as $key => $value) {
            $dumpDot = ', ';

            if ($iterationNum == count($params)) {
                $dumpDot = '';
            }

            $vars1 .= $key . $dumpDot;
            $vars2 .= ':' . $key . $dumpDot;

            array_push($dumpArray, [':' . $key => $value]);
        }

        $sql = 'UPDATE users (' . $vars1 . ') 
                VALUES (' . $vars2 . ')';
        $stmt = static::db()->prepare($sql);

        return $stmt->execute($dumpArray);
    }
}