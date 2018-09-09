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

        $this->actionPDO("INSERT INTO `" . static::tableName() . "` (" . $vars1 . ") VALUES (" . $temple . ")",
            $dumpArray);
    }

    public function update(int $actual_user, array $data, array $actual)
    {
        $vars1 = '';
        $temple = '';
        $vars2 = '';
        $iterationNum = 1;
        $dumpArray = [];

        foreach ($data as $key => $value) {
            $dumpDot = ', ';

            if ($iterationNum == count($data)) {
                $dumpDot = '';
            }

            if ($value != '') {
                $temple .= $key . ' = ? ' . $dumpDot;
                $key = str_replace(["'", "'"], '', $key);
                $vars1 .= '`' . $key . '`' . $dumpDot;
                $dumpArray[] = $value;
            }

            $iterationNum++;
        }

        $dumpArray[] = $actual['id'];

        $this->actionPDO("UPDATE " . static::tableName() . " SET " . $temple . " WHERE id = ?", $dumpArray);
        //$this->con->prepare("INSERT INTO `" . static::tableName() . "` (" . $vars1 . ") VALUES (" . $temple . ")" . ' WHERE id = :id);

//        $statement = $this->con->prepare('UPDATE * FROM ' . static::tableName() . ' WHERE id = :id;');
//        $statement->execute([':id' => $id]);
//
//        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        $statement = $this->con->prepare('SELECT * FROM ' . static::tableName() . ' WHERE id = :id');
        $statement->execute([':id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
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
     */
    public function actionPDO(string $sql, array $params)
    {
        $res = $this->con->prepare($sql);
        $res->execute($params);
    }

    /**
     * @return string
     */
    public static function className(): string
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

}