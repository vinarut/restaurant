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
			$this->view->redirect('/category');
		}
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
        preg_match_all('!\d+$!', $_SERVER['REQUEST_URI'], $result);

        $id = $result['0']['0'];
        $this->view->render('Обновить категорию', ['id' => $id]);

        $boolean = isset($_POST['category']) && !empty($_POST['category']);

        if ($boolean) {
            $this->model->id = $id;
            $this->model->name = $_POST['category'];
            $this->model->update();
            $this->view->redirect('/category');
        }
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
		$this->view->render('Удалить категорию');
	}
}