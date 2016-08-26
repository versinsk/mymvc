<?php

	// Подключение класса роутера
	require_once ROOT . '/app/core/Router.php';

	// Подключение класса контролера
	require_once ROOT . '/app/core/Controller.php';

	// Создание объекта роутера
	$router = new Router();

	$run = $router->run();
