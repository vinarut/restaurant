<?php

namespace application\models;


use application\core\Model;

class Category extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'category';

    /**
     * @var string $primary
     */
    protected $primary = 'id';
}