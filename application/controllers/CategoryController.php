<?php

namespace application\controllers;


use application\core\Controller;

class CategoryController extends Controller
{
	/**
	 * category action
	 */
	public function categoryAction()
	{
		$this->view->render('Категории');
	}
}