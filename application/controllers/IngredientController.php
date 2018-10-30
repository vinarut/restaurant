<?php

namespace application\controllers;


use application\core\Controller;

class IngredientController extends Controller
{
	/**
	 * ingredient action
	 */
	public function ingredientAction()
	{
		$this->view->render('Ингридиенты');
	}
}