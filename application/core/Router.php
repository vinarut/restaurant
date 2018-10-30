<?php

namespace application\core;


class Router
{
	/**
	 * @var array
	 */
    protected $routes = [];

	/**
	 * @var array
	 */
    protected $params = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
		$this->add(include 'application/config/routes.php');
    }

	/**
	 * @param $array
	 */
	private function add($array)
    {
		foreach ($array as $key => $value) {
			$key = '#^'.$key.'$#';
			$this->routes[$key] = $value;
		}
    }

	/**
	 * @return bool
	 */
	private function match()
    {
		$url = trim($_SERVER['REQUEST_URI'], '/');
		foreach ($this->routes as $key => $value) {
			if (preg_match($key, $url)) {
				$this->params = $value;
				return true;
			}
		}
		return false;
    }

	/**
	 *
	 */
	public function run()
    {
		if ($this->match()) {
			$path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
			if (class_exists($path)) {
				$action = $this->params['action'].'Action';
				if (method_exists($path, $action)) {
					$controller = new $path($this->params);
					$controller->$action();
				} else {
					View::errorCode(404);
				}
			} else {
				View::errorCode(404);
			}
		} else {
			View::errorCode(404);
		}
    }
}