<?php
 

class ConDB{
	protected static $pdo;

	protected static function conexao(){
		try{
			self::$pdo = new PDO("mysql:dbname=aps;host=localhost","root","");	
		}catch(PDOException $e){
			echo 'Erro com o banco de dados'.$e->getMessage();

		}
		
	}
}