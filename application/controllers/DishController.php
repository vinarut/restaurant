<?php

namespace application\controllers;


use application\core\Controller;

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

		if ($this->issetNotEmpty()) {
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

        if ($this->issetNotEmpty()) {
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
        $this->model->id = $this->matches();
        $this->model->delete();
        $this->view->redirect('/dish');
	}

    /**
     * @return mixed
     */
    private function matches()
    {
        preg_match_all('!\d+$!', $_SERVER['REQUEST_URI'], $result);
        return $result['0']['0'];
    }
}