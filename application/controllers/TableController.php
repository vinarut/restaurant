<?php
/**
 * Created by PhpStorm.
 * User: vladislav
 * Date: 28.10.2018
 * Time: 21:17
 */

namespace application\controllers;


use application\core\Controller;

class TableController extends Controller
{

	/**
	 * category action
	 */
	public function categoryAction() {
		$this->view->render('Категории');
	}

	/**
	 * dish action
	 */
	public function dishAction() {
		$this->view->render('Блюда');
	}

	/**
	 * dish_ingredients action
	 */
	public function dish_ingredientsAction() {
		$this->view->render('Состав блюд');
	}

	/**
	 * ingredient action
	 */
	public function ingredientAction() {
		$this->view->render('Ингридиенты');
	}


}