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
        $this->view->render('Категории', $this->model->all());
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить категорию');

		if ($this->issetNotEmpty()) {
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

        if ($this->issetNotEmpty()) {
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
        $this->model->id = $this->matches();
        $this->model->delete();
        $this->view->redirect('/category');
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