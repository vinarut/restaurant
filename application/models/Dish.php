<?php

namespace application\models;


use application\core\Model;

class Dish extends Model
{
	/**
	 * @var string $table
	 */
	protected $table = 'dish';

	/**
	 * @var string $primary
	 */
	protected $primary = 'id';
}