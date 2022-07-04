<?php
	
	require_once __DIR__ . '/App/Db.php';
	require_once __DIR__ . '/App/View.php';
	require_once __DIR__ . '/App/ArticleRepository.php';
	require_once __DIR__ . '/App/Article.php';
	require_once __DIR__ . '/App/ArticleController.php';
	
	try{
		$controller = new \App\ArticleController(
			new \App\ArticleRepository(
				new \App\Db()
			),
			new \App\View()
		);
		
		$controller->handle();
		
	} catch(\Exception $e){
		echo $e->getMessage();
	}
	