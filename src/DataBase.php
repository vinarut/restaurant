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
     * @param $connect
     */
    public function __construct($dsn, $user, $password)
    {
        $this->connect = new PDO($dsn, $user, $password);
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
     * @return mixed
     */
    public function prepare($statement)
    {
        return $this->connect->prepare($statement);
    }

    /**
     * @param $statement
     * @return mixed
     */
    public function query($statement)
    {
        return $this->connect->query($statement);
    }
}