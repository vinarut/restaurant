<?php

namespace application\models;


use application\core\Model;

class DishIngredients extends Model
{
	/**
	 * @var string $table
	 */
	protected $table = 'dish_ingredients';

    /**
     * @var array $primary
     */
    protected $primary = ['id_dish', 'id_ingredient'];
}