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
        $this->view->render('Категории', $this->model->all());
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
        $id = $this->matches();

        $sql = "SELECT `name` FROM `category` WHERE `id`='$id'";
        $ret = $this->fetch($sql);

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
        $id = $this->matches();

        $sql = "SELECT `name` FROM `category` WHERE `id`='$id'";
        $ret = $this->fetch($sql);

        $this->view->render('Удалить категорию', ['id' => $id, 'category' => $ret['name']]);

        $boolean = isset($_POST['delete']) && !empty($_POST['delete']);

        if ($boolean) {
            $this->model->id = $id;
            $this->model->delete();
            $this->view->redirect('/category');
        }
	}

    /**
     * @return mixed
     */
    private function matches()
    {
        preg_match_all('!\d+$!', $_SERVER['REQUEST_URI'], $result);
        return $result['0']['0'];
    }

    /**
     * @param $sql
     * @return mixed
     */
    private function fetch($sql)
    {
        return DataBase::singleton()->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}