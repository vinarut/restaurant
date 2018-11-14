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
     * @return string
     */
    private function prepareCompositePrimary()
    {
        $tmp = [];
        foreach ($this->primary as $key) {
            array_push($tmp, $key.'=?');
        }
        return implode(', ', $tmp);
    }

    /**
     * @return bool
     */
    public function create()
    {
        $attrs = $this->queryBuilder();
        $sql = '';
        if (count($this->primary) > 1)
            $sql = "INSERT INTO ".$this->table." SET " . implode(", ", $attrs).", ".$this->prepareCompositePrimary();
        else
            $sql = "INSERT INTO ".$this->table." SET " . implode(", ", $attrs);
        $sth = $this->dataBase->prepare($sql);
        $i = 1;
        foreach(array_keys($attrs) as $key) {
            $param = isset($this->attributes[$key])? $this->attributes[$key]: null;
            $sth->bindValue($i, $param, PDO::PARAM_STR);
            $i ++;
        }
        if (count($this->primary) > 1) {
            foreach($this->primary as $key) {
                $sth->bindParam($i, $this->attributes[$key], PDO::PARAM_INT);
                $i ++;
            }
        }

        if($ret = $sth->execute()) {
            $lastId = $this->dataBase->lastInsertId();
            if ($lastId) {
                array_push($this->primary, $lastId);
            }
		}

		return $ret;
    }

    /**
     * @return string
     */
    private function preparePrimaryCondition()
    {
        if(!is_array($this->primary))
            $this->primary = [$this->primary];
        $tmp = [];
        foreach ($this->primary as $key) {
            array_push($tmp, $key.'=?');
        }
        return implode(" AND ", $tmp);
    }

    /**
     * @return bool
     */
    public function update()
    {
        $attrs = $this->queryBuilder();
        $sql = "UPDATE ".$this->table." SET " . implode(", ", $attrs) . " WHERE ". $this->preparePrimaryCondition();

        $sth = $this->dataBase->prepare($sql);
        $i = 1;
        foreach(array_keys($attrs) as $key) {
            $param = isset($this->attributes[$key])? $this->attributes[$key]: null;
            $sth->bindValue($i, $param, PDO::PARAM_STR);
            $i ++;
        }
        foreach($this->primary as $key) {
            $sth->bindParam($i, $this->attributes[$key], PDO::PARAM_INT);
            $i ++;
        }
        return $sth->execute();
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $sql = "DELETE FROM ".$this->table." WHERE ". $this->preparePrimaryCondition();
        $sth = $this->dataBase->prepare($sql);
        $i = 1;
        foreach($this->primary as $key) {
            $sth->bindParam($i, $this->attributes[$key], PDO::PARAM_INT);
            $i ++;
        }
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
        $this->attributes = $sth->fetch(PDO::FETCH_ASSOC);
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
            if(!is_array($this->primary)) {
                $this->primary = [$this->primary];
            }

            if(!in_array($key, $this->primary)) {
                $t[$key] = "$key=?";
            }
        }

        return $t;
    }
}