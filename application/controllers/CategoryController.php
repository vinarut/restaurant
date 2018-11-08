<?php

namespace application\controllers;


use application\core\Controller;

class CategoryController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction()
	{
		$this->view->render('Категории', $this->getData(lcfirst($this->route['controller'])));
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить категорию');

		$boolean = isset($_POST['category']) && !empty($_POST['category']);

		if ($boolean) {
			$this->model->name = $_POST['category'];
			$this->model->create();
			$this->view->redirect('/category/create');
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