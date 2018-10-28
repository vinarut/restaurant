<?php
/**
 * Created by PhpStorm.
 * User: vladislav
 * Date: 28.10.2018
 * Time: 21:34
 */

namespace application\controllers;


use application\core\Controller;

class MainController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction() {
		$this->view->render('Главная страница');
	}
}