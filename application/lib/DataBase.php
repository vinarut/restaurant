<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 22.10.2018
 * Time: 21:04
 */

namespace application\lib;


use PDO;

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
        $this->database = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'],
			$config['user'], $config['pass'], $this->getOptions());
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