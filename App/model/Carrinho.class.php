<?php
require_once 'ConDB.class.php';

class Carrinho extends ConDB{

	function __construct(){
		parent::conexao();

	}

	public function insert($idCliente,$idProduto){
		$query = self::$pdo->prepare("SELECT * FROM carrinho WHERE idCliente = :idc AND idProduto = :idp");
		$query->bindValue(":idc",$idCliente);
		$query->bindValue(":idp",$idProduto);
		$query->execute();
		if($query->rowCount() > 0){//já existe no banco
			return false;
		}else{
			$query = self::$pdo->prepare("INSERT INTO carrinho(idCliente,idProduto) VALUES (:idc,:idp) ");
			$query->bindValue(":idc",$idCliente);
			$query->bindValue(":idp",$idProduto);
			$query->execute();

			return true;
		}
	}		

	public function buscarDados($idCliente){
		$dados = array();
		$query = self::$pdo->prepare("SELECT idProduto FROM carrinho WHERE idCliente = :id");
		$query->bindValue(":id",$idCliente);
		$query->execute();

		$dados = $query->fetchAll(PDO::FETCH_ASSOC);

		return $dados;
	}
	

}