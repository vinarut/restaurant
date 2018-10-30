<?php

namespace application\models;


use application\core\Model;

class Ingredient extends Model
{
	/**
	 * @var string $table
	 */
	protected $table = 'ingredient';

	/**
	 * @var string $primary
	 */
	protected $primary = 'id';
}