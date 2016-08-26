<?php
	
	/**
	 *  Класс для примера
	 */

	class main extends Controller
	{
		public function index($name = '')
		{
			// Подключаем модуль (по названию)
			$this->model('user');
			// Получаем измененное имя
			$nameSet = user::setName($name);

			// Подключаем вид (по названию и передаем параметры)
			$this->view('main/index', [$nameSet]);

		}

	}