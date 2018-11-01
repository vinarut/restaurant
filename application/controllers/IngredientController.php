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

		$boolean = isset($_POST['ingredient']) && !empty($_POST['ingredient']);

		if ($boolean) {
			$this->model->name = $_POST['ingredient'];
			$this->model->create();
			$this->view->redirect('/ingredient/create');
		}
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