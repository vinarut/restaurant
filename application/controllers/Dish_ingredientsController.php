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

		$boolean = isset($_POST['id_dish']) && !empty($_POST['id_dish']) && isset($_POST['id_ingredient'])
			&& !empty($_POST['id_ingredient']) && isset($_POST['weight']) && !empty($_POST['weight']);

		if ($boolean) {
			$this->model->id_dish = $_POST['id_dish'];
			$this->model->id_ingredient = $_POST['id_ingredient'];
			$this->model->weight = $_POST['weight'];
			$this->model->create();
			$this->view->redirect('/dish_ingredient/create');
		}
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