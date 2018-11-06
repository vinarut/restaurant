<?php

namespace application\core;


use application\lib\DataBase;
use Exception;
use PDO;

abstract class Model
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
    protected $dataBase;

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
	 * @param DataBase $dataBase
	 * @param null $id
	 */
    public function __construct(DataBase $dataBase, $id = null)
    {
        $this->dataBase = $dataBase;
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
        $sth = $this->dataBase->prepare($sql);
        $i = 1;
        foreach(array_keys($attrs) as $key) {
            $param = isset($this->attributes[$key])? $this->attributes[$key]: null;
            $sth->bindValue($i, $param, PDO::PARAM_STR);
            $i ++;
        }

        if($ret = $sth->execute()) {
            $lastId = $this->dataBase->lastInsertId();
            if ($lastId) {
                $this->{$this->primary} = $lastId;
            }
		}

		return $ret;
    }

    /**
     * @return bool
     */
    public function update()
    {
        $attrs = $this->queryBuilder();
        $sql = "UPDATE ".$this->table." SET " . implode(", ", $attrs) . " WHERE " . $this->primary . "=?";
        $sth = $this->dataBase->prepare($sql);
        $i = 1;
        foreach(array_keys($attrs) as $key) {
            $param = isset($this->attributes[$key])? $this->attributes[$key]: null;
            $sth->bindValue($i, $param, PDO::PARAM_STR);
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
        $sth = $this->dataBase->prepare($sql);
        $sth->bindParam(1, $this->attributes[$this->primary], PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * @param $id
     */
    public function load($id)
    {
        $sql = "SELECT * FROM ".$this->table." WHERE " . $this->primary . "=?";
        $sth = $this->dataBase->prepare($sql);
        $sth->bindParam(1, $id, PDO::PARAM_INT);
        $sth->execute();
        $this->attributes = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

	/**
	 * @return array $attributes
	 */
	public function all()
	{
		$sql = "SELECT * FROM ".$this->table." WHERE 1";
		$sth = $this->dataBase->prepare($sql);
		$sth->execute();
		return $sth->fetchAll(PDO::FETCH_ASSOC);
	}

    /**
     *
     */
    private function init()
    {
        $sql = "SHOW COLUMNS FROM ".$this->table;
        $result = $this->dataBase->query($sql);
        foreach($result as $row) {
            $this->metaData[$row['Field']] = $row;
        }
    }

	/**
	 * @param $name
	 * @return mixed|null
	 * @throws Exception
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
	 * @throws Exception
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
        foreach(array_keys($this->metaData) as $key) {
            if($key != $this->primary) {
                $t[$key] = "$key=?";
            }
        }

        return $t;
    }
}