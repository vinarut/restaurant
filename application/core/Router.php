<?php
/**
 * Created by PhpStorm.
 * User: vladislav
 * Date: 27.10.2018
 * Time: 21:51
 */

namespace application\core;


class Router
{
    protected $routes = [];
    protected $params = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
		$this->add(include 'application/config/routes.php');
    }

    private function add($array)
    {
		foreach ($array as $key => $value) {
			$key = '#^'.$key.'$#';
			$this->routes[$key] = $value;
		}
    }

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

    public function run()
    {
		if ($this->match()) {
			$controller = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller.php';
			if (class_exists($controller)) {
				echo $controller;
			} else {
				echo 'Not found '.$controller;
			}
		} else {
			echo '404';
		}
    }
}