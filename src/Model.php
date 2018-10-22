<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 22.10.2018
 * Time: 21:01
 */

namespace src;


class Model
{
    /**
     * @var array
     */
    protected $metaData = [];

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var $DataBase
     */
    protected $connection;

    /**
     * @var $table
     */
    protected $table;

    /**
     * @var $primary
     */
    protected $primary;

    /**
     * Model constructor.
     * @param DataBase $connection
     * @param null $id
     */
    public function __construct(DataBase $connection, $id = null)
    {
        $this->connection = $connection;
        $this->init();
        if($id)
            $this->load($id);
    }

    /**
     * @return bool
     */
    public function create()
    {
        $attrs = $this->queryBuilder();
        $sql = "INSERT INTO ".$this->table." SET " . implode(", ", $attrs);
        $sth = $this->connection->prepare($sql);
        $i = 1;
        foreach(array_keys($attrs) as $key) {
            $param = isset($this->attributes[$key])? $this->attributes[$key]: null;
            $sth->bindParam($i, $param, PDO::PARAM_STR);
            $i ++;
        }
        return $sth->execute();
    }

    /**
     * @return bool
     */
    public function update()
    {
        $attrs = $this->queryBuilder();
        $sql = "UPDATE ".$this->table." SET " . implode(", ", $attrs) . " WHERE " . $this->primary . "=?";
        $sth = $this->connection->prepare($sql);
        $i = 1;
        foreach(array_keys($attrs) as $key) {
            $param = isset($this->attributes[$key])? $this->attributes[$key]: null;
            $sth->bindParam($i, $param, PDO::PARAM_STR);
            $i ++;
        }
        $sth->bindParam($i, $this->attributes[$this->primary], PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $sql = "DELETE FROM ".$this->table." WHERE " . $this->primary . "=?";
        $sth = $this->connection->prepare($sql);
        $sth->bindParam(1, $this->attributes[$this->primary], PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * @param $id
     */
    public function load($id)
    {
        $sql = "SELECT * FROM ".$this->table." WHERE " . $this->primary . "=?";
        $sth = $this->connection->prepare($sql);
        $sth->bindParam(1, $id, PDO::PARAM_INT);
        $sth->execute();
        $this->attributes = $sth->fetch(PDO::FETCH_ASSOC);
    }

    /**
     *
     */
    private function init()
    {
        $sql = "SHOW COLUMNS FROM ".$this->table;
        $result = $this->connection->query($sql);
        foreach($result as $row) {
            $this->metaData[] = $row['Field'];
        }
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if(isset($this->metaData[$name])) {
            return (isset($this->attributes[$name])? $this->attributes[$name]: null);
        }
        throw new Exception("Invalid attribute `".$name."`");
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if(isset($this->metaData[$name])) {
            $this->attributes[$name] = $value;
        } else {
            throw new Exception("Invalid attribute `".$name."`");
        }
    }

    /**
     * @return array
     */
    private function queryBuilder()
    {
        $t = [];
        foreach($this->metaData as $key) {
            if($key != $this->primary) {
                $t[$key] = "$key=?";
            }
        }

        return $t;
    }
}