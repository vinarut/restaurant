<?php

namespace application\controllers;


use application\core\Controller;
use application\lib\DataBase;
use PDO;

class DishController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction()
	{
        $sql = "SELECT `d`.`id`, `d`.`name` as `d_name`, `d`.`price` as `price`, `c`.`name` FROM `dish` as `d` 
				JOIN `category` as `c` ON `d`.`id_category` = `c`.`id`";
        $ret = $this->fetchAll($sql);
        $this->view->render('Блюда', $ret);
	}

	/**
	 * create action
	 */
	public function createAction()
	{
        $sql = "SELECT * FROM `category`";
        $ret = $this->fetchAll($sql);
        $this->view->render('Добавить блюдо', $ret);

		$boolean = isset($_POST['dish']) && !empty($_POST['dish']) && isset($_POST['price']) && !empty($_POST['price'])
			&& isset($_POST['id_category']) && !empty($_POST['id_category']);

		if ($boolean) {
			$this->model->name = $_POST['dish'];
			$this->model->price = $_POST['price'];
			$this->model->id_category = $_POST['id_category'];
			$this->model->create();
			$this->view->redirect('/dish');
		}
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
        $id = $this->matches();

        $sql = "SELECT `name`, `price` FROM `dish` WHERE `id`='$id'";
        $ret = $this->fetch($sql);
        $sql = "SELECT * FROM `category`";
        $categories = $this->fetchAll($sql);

        $this->view->render('Обновить категорию', ['id' => $id, 'categories' => $categories, 'dish' => $ret]);

        $boolean = isset($_POST['dish']) && !empty($_POST['dish']) && isset($_POST['price']) && !empty($_POST['price'])
            && isset($_POST['id_category']) && !empty($_POST['id_category']);

        if ($boolean) {
            $this->model->id = $id;
            $this->model->name = $_POST['dish'];
            $this->model->price = $_POST['price'];
            $this->model->id_category = $_POST['id_category'];
            $this->model->update();
            $this->view->redirect('/dish');
        }
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
        $id = $this->matches();

        $sql = "SELECT `name` FROM `dish` WHERE `id`='$id'";
        $ret = $this->fetch($sql);

        $this->view->render('Удалить категорию', ['id' => $id, 'dish' => $ret['name']]);

        $boolean = isset($_POST['delete']) && !empty($_POST['delete']);

        if ($boolean) {
            $this->model->id = $id;
            $this->model->delete();
            $this->view->redirect('/dish');
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

    /**
     * @param $sql
     * @return array
     */
    private function fetchAll($sql)
    {
        return DataBase::singleton()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}