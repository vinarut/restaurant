<?php

namespace application\controllers;


use application\core\Controller;

class DishController extends Controller
{
	/**
	 * dish action
	 */
	public function dishAction()
	{
		$this->view->render('Блюда',$this->getData());
	}

	/**
	 * create action
	 */
	public function createAction()
	{
		$this->view->render('Добавить блюдо');
	}

	/**
	 * update action
	 */
	public function updateAction()
	{
		$this->view->render('Обновить блюдо');
	}

	/**
	 * delete action
	 */
	public function deleteAction()
	{
		$this->view->render('Удалить блюдо');
	}
}