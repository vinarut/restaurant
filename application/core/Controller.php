<?php

namespace application\core;


use application\lib\DataBase;
use PDO;

abstract class Controller
{
	/**
	 * @var string
	 */
	private $route;

	/**
	 * @var View
	 */
	protected $view;

	/**
	 * @var Model
	 */
	protected $model;

	/**
	 * Controller constructor.
	 * @param $route
	 */
	public function __construct($route)
	{
		$this->route = $route;
		$this->view = new View($this->route);
		$this->model = $this->loadModel($this->route['controller']);
	}

	/**
	 * @param $name
	 * @return null
	 */
	private function loadModel($name)
	{
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path(new DataBase());
		}
		return null;
	}

    /**
     * @return boolean
     */
    protected function issetNotEmpty()
    {
        if (empty($_POST))
            return false;

        foreach ($_POST as $key => $value) {
            $boolean = isset($value) && !empty($value);
            if (!$boolean)
                return false;
        }
        return true;
    }

    /**
     * @param $sql
     * @return mixed
     */
    protected function fetch($sql)
    {
        return DataBase::singleton()->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @return array
     */
    protected function fetchAll($sql)
    {
        return DataBase::singleton()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}