<?php

return [

    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],

    'index' => [
        'controller' => 'main',
        'action' => 'index'
    ],

    'category' => [
        'controller' => 'category',
        'action' => 'index'
    ],

    'category/create' => [
        'controller' => 'category',
        'action' => 'create'
    ],

    'category/update/[0-9]+' => [
        'controller' => 'category',
        'action' => 'update'
    ],

    'category/delete/[0-9]+' => [
        'controller' => 'category',
        'action' => 'delete'
    ],

    'dish' => [
        'controller' => 'dish',
        'action' => 'index'
    ],

    'dish/create' => [
        'controller' => 'dish',
        'action' => 'create'
    ],

    'dish/update/[0-9]+' => [
        'controller' => 'dish',
        'action' => 'update'
    ],

    'dish/delete/[0-9]+' => [
        'controller' => 'dish',
        'action' => 'delete'
    ],

    'dishIngredients' => [
        'controller' => 'dishIngredients',
        'action' => 'index'
    ],

    'dishIngredients/create' => [
        'controller' => 'dishIngredients',
        'action' => 'create'
    ],

    'dishIngredients/update/[0-9]+:[0-9]+' => [
        'controller' => 'dishIngredients',
        'action' => 'update'
    ],

    'dishIngredients/delete/[0-9]+:[0-9]+' => [
        'controller' => 'dishIngredients',
        'action' => 'delete'
    ],

    'ingredient' => [
        'controller' => 'ingredient',
        'action' => 'index'
    ],

    'ingredient/create' => [
        'controller' => 'ingredient',
        'action' => 'create'
    ],

    'ingredient/update/[0-9]+' => [
        'controller' => 'ingredient',
        'action' => 'update'
    ],

    'ingredient/delete/[0-9]+' => [
        'controller' => 'ingredient',
        'action' => 'delete'
    ],

];