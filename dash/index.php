<?php

	$autoload = function($class){
		//para funcionar tanto em linux quanto em windows
		$class = str_replace('\\', '/', $class);

		include($class .'.php');
	};
	spl_autoload_register($autoload);

	$app = new Application();
	$app->executar();
