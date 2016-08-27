<?php

	/**
	 *  Класс для примера
	 */

	class main extends vl\app\core\Controller
	{
		public function index()
		{
			// Вывод true (test)
			$nameSet = vl\app\models\user::setName();

			// Подключение view
			$this->view('main/index', [$nameSet]);

		}

		public function reg()
		{
			echo "main/reg";
		}

	}