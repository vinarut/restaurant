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
		$this->view->render('Категории', $this->getData());
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить категорию');
		if (isset($_POST['category']) && !empty($_POST['category'])) {
			$this->model->create();
		}
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
		$this->view->render('Обновить категорию');
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
		$this->view->render('Удалить категорию');
	}
}