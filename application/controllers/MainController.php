<?php

namespace application\controllers;


use application\core\Controller;

class MainController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction()
	{
		$this->view->render('Главная страница');
	}
}