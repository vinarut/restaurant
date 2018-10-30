<?php

namespace application\models;


use application\core\Model;

class Category extends Model
{
    /**
     * @var $table
     */
    protected $table = 'category';

    /**
     * @var $primary
     */
    protected $primary = 'id';
}