<?php

namespace application\controllers;


use application\core\Controller;
use application\lib\DataBase;
use PDO;

class IngredientController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction()
	{
		$this->view->render('Ингредиенты', $this->model->all());
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
        $id = $this->matches();

        $sql = "SELECT `name` FROM `ingredient` WHERE `id`='$id'";
        $ret = $this->fetch($sql);

        $this->view->render('Обновить ингредиент', ['id' => $id, 'ingredient' => $ret['name']]);

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
        $id = $this->matches();

        $sql = "SELECT `name` FROM `ingredient` WHERE `id`='$id'";
        $ret = $this->fetch($sql);

        $this->view->render('Удалить ингредиент', ['id' => $id, 'ingredient' => $ret['name']]);

        $boolean = isset($_POST['delete']) && !empty($_POST['delete']);

        if ($boolean) {
            $this->model->id = $id;
            $this->model->delete();
            $this->view->redirect('/ingredient');
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