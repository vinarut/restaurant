<?php

namespace application\lib;


use PDO;
use PDOException;
use PDOStatement;

class DataBase
{
    private static $instance;
    private $database;

	/**
	 * DataBase constructor.
	 */
    public function __construct()
    {
    	$config = include 'application/config/config.php';
    	$dsn = 'mysql:host='.$config['host'].';dbname='.$config['name'].';charset='.$config['encoding'];

    	try {
    		$this->database = new PDO($dsn, $config['user'], $config['pass'], $this->getOptions());
		} catch (PDOException $exception) {
    		die('Could not connect to the database');
		}
    }

	/**
	 * @return DataBase
	 */
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

	/**
	 * @return array
	 */
	private function getOptions() {
    	return [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_CASE => PDO::CASE_NATURAL,
			PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
		];
	}

	/**
	 * @return string
	 */
	public function lastInsertId()
	{
		return $this->database->lastInsertId();
	}

    /**
     * @param $statement
     * @return bool|PDOStatement
     */
    public function prepare($statement)
    {
        return $this->database->prepare($statement);
    }

    /**
     * @param $statement
     * @return bool|PDOStatement
     */
    public function query($statement)
    {
        return $this->database->query($statement);
    }

    /**
     * DataBase destructor
     */
    public function __destruct()
    {
        $this->database = null;
    }
}