<?php

	/**
	 *  Класс для примера
	 */

	class mainController extends vl\app\core\controller
	{
		public function indexAction()
		{
			// Вывод true (test)
			$nameSet = vl\app\models\user::setName();

			// Подключение view
			$this->view('main/index', [$nameSet]);

		}

		public function regAction()
		{
			echo "main/reg";
		}

	}