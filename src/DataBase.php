<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 22.10.2018
 * Time: 21:04
 */

namespace src;


class DataBase
{
    private static $instance;
    private $connect;

    /**
     * DataBase constructor.
     * @param $dsn
     * @param $user
     * @param $password
     */
    public function __construct($dsn, $user, $password)
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];
        $this->connect = new PDO($dsn, $user, $password, $options);
    }

    /**
     * @param $dsn
     * @param $user
     * @param $password
     * @return DataBase
     */
    public static function singleton($dsn, $user, $password)
    {
        if (!isset(self::$instance)) {
            self::$instance = new self($dsn, $user, $password);
        }

        return self::$instance;
    }

    /**
     * @param $statement
     * @return bool|PDOStatement
     */
    public function prepare($statement)
    {
        return $this->connect->prepare($statement);
    }

    /**
     * @param $statement
     * @return bool|PDOStatement
     */
    public function query($statement)
    {
        return $this->connect->query($statement);
    }

    /**
     * DataBase destructor
     */
    public function __destruct()
    {
        $this->connect = null;
    }
}