<?php

namespace application\core;


use application\lib\DataBase;

abstract class Controller
{
	/**
	 * @var string
	 */
	public $route;

	/**
	 * @var View
	 */
	public $view;

	/**
	 * @var Model
	 */
	public $model;

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
	public function loadModel($name)
	{
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path(new DataBase());
		}
		return null;
	}

    /**
     * @param string $table
     * @return array attributes
     */
	public function getData($table)
	{
		return $this->model->all($table);
	}
}