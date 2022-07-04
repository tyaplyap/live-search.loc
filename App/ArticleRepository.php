<?php
	
	namespace App;
	
	class ArticleRepository
	{
		private Db $db;
		
		public function __construct(Db $db)
		{
			$this->db = $db;
		}
		
		public function getById(int $id): ?Article
		{
			$result = $this->db->query(
				'SELECT * FROM `articles` WHERE `id` = :id LIMIT 1',
				[':id' => $id],
				Article::class
			);
			
			return ! empty($result[0])? $result[0] : null;
		}
		
		public function findByTitle(array $fields): array
		{
			if(empty($fields['articles'])){
				throw new \Exception('Отправлен пустой запрос');
			}
			
			$search = $fields['articles'];
			$search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
			$search = trim($search);
			$search = '%' . $search . '%';
			return $this->db->query(
				'SELECT * FROM `articles`
					WHERE `title` LIKE :search
						ORDER BY `title` LIMIT 10',
				[':search' => $search], 
				Article::class
			);
		}
	}