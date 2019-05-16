<?php

require_once 'ConDB.class.php';

class Produto extends ConDB{

	function __construct(){
		parent::conexao();
	}

	public function cadastrarProduto($arquivo,$nome_produto,$categoria,$preco){
		$query = self::$pdo->prepare("INSERT INTO produto(arquivo,nome,categoria,preco) VALUES (:a,:n,:c,:p) ");
		$query->bindValue(":a",$arquivo);
		$query->bindValue(":n",$nome_produto);
		$query->bindValue(":c",$categoria);
		$query->bindValue(":p",$preco);
		if($query->execute()){
			return true;
		}

		return false;



	}

	public function buscarDados(){
		$res = array();
		$query = self::$pdo->prepare("SELECT * FROM produto");
		$query->execute();

		$res = $query->fetchAll(PDO::FETCH_ASSOC);

		return $res;

	}

	public function buscarDadosProduto($id){
		$res = array();
		$query = self::$pdo->prepare("SELECT * FROM produto WHERE id = :id");
		$query->bindValue(":id",$id);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);

		return $res;

	}

	public function updateProduto($id,$nome,$categoria,$preco){
		$query = self::$pdo->prepare("UPDATE produto SET nome = :n, categoria = :c, preco = :p WHERE id = :id ");
		$query->bindValue(":id",$id);
		$query->bindValue(":n",$nome);
		$query->bindValue(":c",$categoria);
		$query->bindValue(":p",$preco);
		if($query->execute()){
			return true;
		}

		return false;
	}

	public function deleteProduto($id){
		$query = self::$pdo->prepare("DELETE FROM produto WHERE id = :id");
		$query->bindValue(":id",$id);
		$query->execute();

		return true;

	}


}