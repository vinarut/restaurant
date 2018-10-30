<?php

namespace application\core;


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
//		$this->model = $this->loadModel($this->route['controller']);
//		debug($this->model);
	}

	/**
	 * @param $name
	 * @return null
	 */
	public function loadModel($name)
	{
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
		return null;
	}

	/**
	 * @param null $id
	 * @return array $attributes
	 */
	public function getData($id = null)
	{
		$this->model->load($id);
		return $this->model->getAttributes();
	}
}