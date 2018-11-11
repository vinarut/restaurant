<?php

namespace application\controllers;


use application\core\Controller;
use application\lib\DataBase;
use PDO;

class DishIngredientsController extends Controller
{
	/**
	 * index action
	 */
	public function indexAction()
	{
        $sql = "SELECT `di`.`id_dish`, `di`.`id_ingredient`, `d`.`name` as `d_name`, `i`.`name` as `i_name`, `di`.`weight`
				FROM `dish_ingredients` as `di`
				JOIN `ingredient` as `i` ON `di`.`id_ingredient` = `i`.`id`
				JOIN `dish` as `d` ON `di`.`id_dish` = `d`.`id`";
        $ret = DataBase::singleton()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->view->render('Состав блюд', $ret);
	}

	/**
	 * create action
	 */
	public function createAction()
	{
        $dishes_ingredients = [
            'dishes' => $this->getData('dish'),
            'ingredients' => $this->getData('ingredient')
        ];
		$this->view->render('Добавить состав', $dishes_ingredients);

		$boolean = isset($_POST['id_dish']) && !empty($_POST['id_dish']) && isset($_POST['id_ingredient'])
			&& !empty($_POST['id_ingredient']) && isset($_POST['weight']) && !empty($_POST['weight']);

		if ($boolean) {
			$this->model->id_dish = $_POST['id_dish'];
			$this->model->id_ingredient = $_POST['id_ingredient'];
			$this->model->weight = $_POST['weight'];
			$this->model->create();
			$this->view->redirect('/dishIngredients');
		}
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
        preg_match_all('!\d+:\d+$!', $_SERVER['REQUEST_URI'], $result);

        $id = $result['0']['0'];
        $this->view->render('Обновить состав', ['id' => $id, 'dishes' => $this->getData('dish'),
            'ingredients' => $this->getData('ingredient')]);

        $boolean = isset($_POST['id_dish']) && !empty($_POST['id_dish']) && isset($_POST['id_ingredient'])
            && !empty($_POST['id_ingredient']) && isset($_POST['weight']) && !empty($_POST['weight']);

        if ($boolean) {
            $this->model->id_dish = $_POST['id_dish'];
            $this->model->id_ingredient = $_POST['id_ingredient'];
            $this->model->weight = $_POST['weight'];
            $this->model->update();
            $this->view->redirect('/dishIngredients');
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