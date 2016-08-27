<?php

	// Вывод ошибок
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	// Константа директории
	define('ROOT', dirname(__FILE__));

	// Подключение init.php
	require_once ROOT . '/app/init.php';