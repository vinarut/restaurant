<?php

namespace application\controllers;


use application\core\Controller;

class DishController extends Controller
{
	/**
	 * dish action
	 */
	public function dishAction()
	{
		$this->view->render('Блюда');
	}
}