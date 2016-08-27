<?php
	namespace vl\app\core;
	
	class router
	{
		// Массив с подготовленными запросами
		private $routes;

		// Название контроллера
		private $controller = 'main';

		// Название метода 
		private $method = 'index';

		// Параметры
		private $params = [];

		public function __construct()
		{
			// Подключение массива с подготовленными запросами
			$routes = require_once '../app/config/routes.php';
			$this->routes = $routes;
		}

		public function run()
		{
			// Получение отредактированного URI
			$uri = $this->uri();

			// Строгая проверка на заполненость названия контроллера и названия метода
			if (!empty($uri[0]) && !empty($uri[1])) {
				// Перебор и проверка запроса с URI и заготовленных запросов
				foreach ($this->routes as $pattern) {
					if ($uri[0] . '/' . $uri[1] === $pattern) {
						// Присваиваем свойству значения
						$pattern = explode('/', $pattern);
						$this->controller = $pattern[0];
						$this->method = $pattern[1];
						// Удаление всего лишнего из запроса URI
						unset($uri[0]);
						unset($uri[1]);
						break;
					}
				}
			}
			// Подключение файл контроллера
			require_once '../app/controllers/' . $this->controller . '.php';
			// Создание объекта контроллера
			$this->controller = new $this->controller();

			// Возвращает параметры
			$this->param = (!empty($uri)) ? $uri : [];
			
			call_user_func_array([$this->controller, $this->method], $this->param);

		}

		public function uri()
		{
			// Проверка и редактирование на существование URI 
			if (isset($_GET['uri']))
			{
				return explode('/', rtrim(filter_var($_GET['uri'], FILTER_SANITIZE_URL), '/'));
			}
		}

	}