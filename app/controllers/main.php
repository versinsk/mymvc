<?php

	/**
	 *  Класс для примера
	 */

	class main extends vl\app\core\Controller
	{
		public function index()
		{
echo "string";
			// Получаем измененное имя
			$nameSet = vl\app\models\user::setName();

			// Подключаем вид (по названию и передаем параметры)
			//$this->view('main/index', [$nameSet]);

		}

	}