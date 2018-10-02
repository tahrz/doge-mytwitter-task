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
abstract class Model extends \Illuminate\Database\Eloquent\Model implements ModelInterface
{
    /**
     * @var
     */
    static protected $db;

    /**
     * @param array $request
     * @param string|null $additional
     */
    public function create(array $request, string $additional = null)
    {
        $vars1 = '';
        $temple = '';

        if (!$additional) {
            $vars1 = '`id`, ';
            $temple = 'Null, ';
        }

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

    public function drop(array $data)
    {
        $vars1 = '';
        $temple = '';
        $vars2 = '';
        $iterationNum = 1;
        $dumpArray = [];

        foreach ($data as $key => $value) {
            $dumpDot = ' AND ';

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

        $this->actionPDO("DELETE FROM " . static::tableName() . " WHERE " . $temple, $dumpArray);
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