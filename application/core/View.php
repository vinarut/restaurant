<?php

namespace application\core;


class View
{
	/**
	 * @var string
	 */
	public $path;

	/**
	 * @var string
	 */
	public $route;

	/**
	 * @var string
	 */
	public $layout = 'default';

	/**
	 * View constructor.
	 * @param $route
	 */
	public function __construct($route)
	{
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	/**
	 * @param $title
	 * @param array $vars
	 */
	public function render($title, $vars = []) {
		$path = 'application/views/forms/'.$this->path.'.php';
		if (file_exists($path)) {
			ob_start();
			include $path;
			$content = ob_get_clean();
			include 'application/views/layouts/'.$this->layout.'.php';
		} else {
			self::errorCode(404);
		}
	}

	/**
	 * @param $code
	 */
	public static function errorCode($code) {
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			http_response_code($code);
			include $path;
			exit;
		}
	}
}