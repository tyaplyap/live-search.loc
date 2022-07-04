<?php
	
	namespace App;
	
	class ArticleController
	{
		private ArticleRepository $articleRepository;
		private View $view;
		
		public function __construct(
			ArticleRepository $articleRepository,
			View $view
		){
			$this->articleRepository = $articleRepository;
			$this->view = $view;
		}
		
		public function handle()
		{
			if(! empty($_POST)){
				try{
					$articles = $this->articleRepository->findByTitle($_POST);
				} catch(\Exception $e){
					echo $e->getMessage(); // вместо этого нужен вызов вью с ошибкой
					return;
				}
				
				// Если поиск не дал результатов, ничего не возвращаем
				// чтобы лишние html-теги из searchForm.php не попали на страницу
				// Перенес эту логику в шаблон searchResults.php
				/* if($articles === []){
					return;
				} */
				
				// Подаем только вставку для страницы поиска searchForm.php
				$this->view->renderHtml('searchResults.php', ['articles' => $articles]);
				return;
			}
			
			$this->view->renderHtml('searchForm.php');
		}
	}