<?php

namespace application\controllers;


use application\core\Controller;

class Dish_ingredientsController extends Controller
{
	/**
	 * dish_ingredients action
	 */
	public function dish_ingredientsAction()
	{
		$this->view->render('Состав блюд');
	}
}