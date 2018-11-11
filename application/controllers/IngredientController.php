<?php

namespace application\controllers;


use application\core\Controller;

class IngredientController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction()
	{
		$this->view->render('Ингредиенты', $this->getData(lcfirst($this->route['controller'])));
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
			$this->view->redirect('/ingredient');
		}
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
        preg_match_all('!\d+$!', $_SERVER['REQUEST_URI'], $result);

        $id = $result['0']['0'];
        $this->view->render('Обновить ингредиент', ['id' => $id]);

        $boolean = isset($_POST['ingredient']) && !empty($_POST['ingredient']);

        if ($boolean) {
            $this->model->id = $id;
            $this->model->name = $_POST['ingredient'];
            $this->model->update();
            $this->view->redirect('/ingredient');
        }
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
		$this->view->render('Удалить ингредиент');
	}
}