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
        $ret = $this->fetchAll($sql);
        $this->view->render('Состав блюд', $ret);
	}

	/**
	 * create action
	 */
	public function createAction()
	{
        $sql = "SELECT * FROM `dish`";
        $dishes = $this->fetchAll($sql);
        $sql = "SELECT * FROM `ingredient`";
        $ingredients = $this->fetchAll($sql);

        $this->view->render('Добавить состав', ['dishes' => $dishes, 'ingredients' => $ingredients]);

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
        $id = explode(':', $this->matches());
        $sql = "SELECT `weight` FROM `dish_ingredients` WHERE `id_dish`='$id[0]' AND `id_ingredient`='$id[1]'";
        $weight = $this->fetch($sql)['weight'];
        $this->view->render('Обновить состав', ['id' => $this->matches(), 'weight' => $weight]);

        $boolean = isset($_POST['id_dish']) && !empty($_POST['id_dish']) && isset($_POST['id_ingredient'])
            && !empty($_POST['id_ingredient']) && isset($_POST['weight']) && !empty($_POST['weight']);

        if ($boolean) {
            $this->model->id_dish = $id[0];
            $this->model->id_ingredient = $id[1];
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
        $id = explode(':', $this->matches());

        $sql = "SELECT `name` FROM `dish` WHERE `id`='$id[0]'";
        $dish = $this->fetch($sql);
        $sql = "SELECT `name` FROM `ingredient` WHERE `id`='$id[1]'";
        $ingredient = $this->fetch($sql);

        $this->view->render('Удалить состав', ['id' => $this->matches(), 'dish' => $dish['name'],
            'ingredient' => $ingredient['name']]);

        $boolean = isset($_POST['delete']) && !empty($_POST['delete']);

        if ($boolean) {
            $this->model->id_dish = $id[0];
            $this->model->id_ingredient = $id[1];
            $this->model->delete();
            $this->view->redirect('/dishIngredients');
        }
	}

    /**
     * @return mixed
     */
    private function matches()
    {
        preg_match_all('!\d+:\d+$!', $_SERVER['REQUEST_URI'], $result);
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