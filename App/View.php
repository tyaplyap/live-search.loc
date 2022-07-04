<?php
	
	namespace App;
	
	class View
	{
		protected const TEMPLATE_PATH = __DIR__ . '/../templates/';
		
		/**
		* @var $templateName string - путь к файлу от TEMPLATE_PATH, напр.: 'forms/form.php';
		* @var array - передаем ассоц. массив, например: ['post' => $post, ...]
		* @var $code - http-заголовок, отдаем 200 по умолчанию, 404 если стр. не найдена, ...
		*/
		public function renderHtml(string $templateName, array $vars = [], int $code = 200)
		{
			http_response_code($code);
			
			extract($vars);
			
			ob_start();
			include self::TEMPLATE_PATH . $templateName;
			$buffer = ob_get_clean();
			
			echo $buffer;
		}
	}