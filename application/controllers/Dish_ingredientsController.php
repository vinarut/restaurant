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
		$this->view->render('Состав блюд', $this->getData());
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить состав');
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
		$this->view->render('Обновить состав');
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
		$this->view->render('Удалить категорию');
	}
}