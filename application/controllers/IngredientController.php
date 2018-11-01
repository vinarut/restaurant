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
		$this->view->render('Ингредиенты', $this->getData());
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить ингредиент');
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
		$this->view->render('Обновить ингредиент');
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
		$this->view->render('Удалить ингредиент');
	}
}