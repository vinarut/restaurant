<?php

use application\core\Router;

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
	exit;
}

spl_autoload_register(function ($class) {
	$path = str_replace('\\', '/', $class.'.php');
	if (file_exists($path)) {
		include $path;
	}
});

$router = new Router();
$router->run();

