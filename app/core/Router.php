<?php

	class Router
	{
		// Массив с шаблонами
		private $routes;

		// Название контроллера
		private $controller = 'main';

		//Название метода 
		private $method = 'index';

		// Параметры
		private $params = [];

		public function __construct()
		{
			// Получение масива с шаблонами
			$routesPath = require_once ROOT . '/app/components/routes.php';
			$this->routes = $routesPath;
		}

		public function run()
		{
			// Получение кусков URI (масив)
			$uri = $this->uri();
			// Строгая проверка на заполненость названия контроллера и названия метода
			if (!empty($uri[0]) && !empty($uri[1])) {
				// Перебор и проверка шаблона с URI и заготовленных шаблонов (масива)
				foreach ($this->routes as $pattern) {
					if ($uri[0] . '/' . $uri[1] === $pattern) {
						// Если совпало, то присваиваем значения
						$pattern = explode('/', $pattern);
						$this->controller = $pattern[0];
						$this->method = $pattern[1];
						// Удаляем с масива название контроллера и метода (остаются параметры)
						unset($uri[0]);
						unset($uri[1]);
						break;
					}
				}
			}
			// Подключаем файл контроллера
			require_once ROOT . '/app/controllers/' . $this->controller . '.php';
			// Создаем объект контроллера
			$this->controller = new $this->controller();

			// Возвращаем параметры, если есть
			$this->param = isset($uri) ? $uri : [];
			call_user_func_array([$this->controller, $this->method], $this->param);

		}

		public function uri()
		{
			// Проверка и вывод поделенного URI (масив)
			if (isset($_GET['uri']))
			{
				return explode('/', rtrim(filter_var($_GET['uri'], FILTER_SANITIZE_URL), '/'));
			}
		}

	}