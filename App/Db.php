<?php
	
	namespace App;
	
	// Для упрощения не используем singleton.
	class Db
	{
		private \PDO $dbh; // $dbh - data base handler
		
		public function __construct()
		{
			try{
				$this->dbh = new \PDO('mysql:dbname=experimental;host=localhost;charset=UTF8', 'root', '');
			} catch(\PDOException $e){
				throw new \Exception('Ошибка подключения к база данных: ' . $e->getMessage());
			}
		}
		
		public function query(string $sql, $params = [], $className = \stdClass::class): array
		{
			$sth = $this->dbh->prepare($sql); // $sth - statement handler
			$sth->execute($params);
			
			return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
		}
	}