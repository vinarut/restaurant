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
		$this->view->render('Блюда',$this->getData());
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить блюдо');

		$boolean = isset($_POST['dish']) && !empty($_POST['dish']) && isset($_POST['price']) && !empty($_POST['price'])
			&& isset($_POST['id_category']) && !empty($_POST['id_category']);

		if ($boolean) {
			$this->model->name = $_POST['dish'];
			$this->model->price = $_POST['price'];
			$this->model->id_category = $_POST['id_category'];
			$this->model->create();
			$this->view->redirect('/dish/create');
		}
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
		$this->view->render('Обновить блюдо');
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
		$this->view->render('Удалить блюдо');
	}
}