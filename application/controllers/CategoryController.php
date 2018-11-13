<?php

namespace application\controllers;


use application\core\Controller;
use application\lib\DataBase;
use PDO;

class CategoryController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction()
	{
        $sql = "SELECT * FROM `category`";
        $ret = DataBase::singleton()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->view->render('Категории', $ret);
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
        $sql = "SELECT `name` FROM `category` WHERE `id`='$id'";
        $ret = DataBase::singleton()->query($sql)->fetch(PDO::FETCH_ASSOC);
        $this->view->render('Обновить категорию', ['id' => $id, 'category' => $ret['name']]);

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
        preg_match_all('!\d+$!', $_SERVER['REQUEST_URI'], $result);

        $id = $result['0']['0'];

        $sql = "SELECT `name` FROM `category` WHERE `id`='$id'";
        $ret = DataBase::singleton()->query($sql)->fetch(PDO::FETCH_ASSOC);

        $this->view->render('Удалить категорию', ['id' => $id, 'name' => $ret['name']]);

        $boolean = isset($_POST['delete']) && !empty($_POST['delete']);

        if ($boolean) {
            $this->model->id = $id;
            $this->model->delete();
            $this->view->redirect('/category');
        }
	}
}