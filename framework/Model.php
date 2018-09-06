<?php

namespace Framework;

use PDO;
use App\Contracts\Connect;
use App\Contracts\ModelInterface;

/**
 * Class Model
 *
 * @package framework
 */
abstract class Model extends Connect implements ModelInterface
{
    /**
     * @var
     */
    static protected $db;

    /**
     * @param array $request
     */
    public function create(array $request)
    {
        $vars1 = '`id`, ';
        $temple = 'Null, ';
        $vars2 = '';
        $iterationNum = 1;
        $dumpArray = [];

        foreach ($request as $key => $value) {
            $dumpDot = ', ';

            if ($iterationNum == count($request)) {
                $dumpDot = '';
            }

            $temple .= '?' . $dumpDot;
            $key = str_replace(["'", "'"], '', $key);
            $vars1 .= '`' . $key . '`' . $dumpDot;

            $dumpArray[] = $value;
            $iterationNum++;
        }

        $sql = 'INSERT INTO users (' . $vars1 . ') 
                VALUES (' . $vars2 . ')';
        $stmt = static::db()->prepare($sql);

        $this->actionPDO("INSERT INTO `" . static::tableName() . "` (" . $vars1 . ") VALUES (" . $temple . ")",
            $dumpArray);
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        $sql = "SELECT * FROM " . static::tableName();
        $res = $this->con->query($sql);
        $dump_array = [];
        foreach ($res as $r) {
            array_push($dump_array, $r);
        }

        return array_reverse($dump_array);
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function actionPDO(string $sql, array $params)
    {
        $res = $this->con->prepare($sql);
        $res->execute($params);
    }

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
    public static function className(): string
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

}