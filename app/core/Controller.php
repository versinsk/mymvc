<?php

	class Controller
	{
		// Подключаем файл с модулями (по названию)
		public function model($nameModel)
		{
			require_once ROOT . '/app/models/' . $nameModel . '.php';
		}

		// Подключаем файл с видом (по названию и передаем параметры)
		public function view($nameView, $data = [])
		{
			require_once ROOT . '/app/views/' . $nameView . '.php';
		}
	}