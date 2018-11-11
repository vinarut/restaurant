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
        $ret = DataBase::singleton()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->view->render('Блюда', $ret);
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить блюдо', $this->getData('category'));

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
        preg_match_all('!\d+$!', $_SERVER['REQUEST_URI'], $result);

        $id = $result['0']['0'];
        $this->view->render('Обновить категорию', ['id' => $id, 'categories' => $this->getData('category')]);

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
		$this->view->render('Удалить блюдо');
	}
}