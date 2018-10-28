<?php
/**
 * Created by PhpStorm.
 * User: vladislav
 * Date: 28.10.2018
 * Time: 21:27
 */

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
	 * Controller constructor.
	 * @param $route
	 */
	public function __construct($route)
	{
		$this->route = $route;
		$this->view = new View($this->route);
	}
}