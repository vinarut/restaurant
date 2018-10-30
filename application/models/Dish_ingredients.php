<?php

namespace application\models;


use application\core\Model;

class Dish_ingredients extends Model
{
	/**
	 * @var string $table
	 */
	protected $table = 'dish_ingredients';

	/**
	 * @var string $primary
	 */
	protected $primary = 'id_dish AND id_ingredient';
}