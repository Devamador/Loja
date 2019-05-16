<?php
require_once 'ConDB.class.php';


class Cliente extends ConDB
{

	function __construct(){
		parent::conexao();
	}
	

	public function cadastrarCliente($nome,$email,$senha){
		//verifica se o email já foi cadastrado.
		$cmd = self::$pdo->prepare("SELECT id FROM cliente WHERE email = :e");
		$cmd->bindValue(":e",$email);
		$cmd->execute();
		if($cmd->rowCount() > 0){//email já existe no banco
			return false;
		}else{
			$cmd = self::$pdo->prepare("INSERT INTO cliente(nome,email,senha,admin) VALUES (:n,:e,:s,0) ");
			$cmd->bindValue(":n",$nome);
			$cmd->bindValue(":e",$email);
			$cmd->bindValue(":s",$senha);
			$cmd->execute();	

			return true;
		}


		
	}

	public function buscaDadosCliente($id){// retorna todos os dados do cliente que está logado
		$res = array();
		$cmd = self::$pdo->prepare("SELECT * FROM cliente WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();

		$res = $cmd->fetch(PDO::FETCH_ASSOC);

		return $res;
	}

	public function buscaDados($email,$senha){
		$res = array();
		$cmd = self::$pdo->prepare("SELECT * FROM cliente WHERE email = :e AND senha = :s");
		$cmd->bindValue(":e",$email);
		$cmd->bindValue(":s",$senha);
		$cmd->execute();
		$res = $cmd->fetch(PDO::FETCH_ASSOC);

		return $res;

	}

	public function buscaCliente($email,$senha){//verifica se cliente existe no banco

		$cmd = self::$pdo->prepare("SELECT * FROM cliente WHERE email = :e AND senha = :s");
		$cmd->bindValue(":e",$email);
		$cmd->bindValue(":s",$senha);
		$cmd->execute();

		if($cmd->rowCount() == 1){
			return true;
		}else{
			return false;
		}


	}

	public function alterarSenha($id,$senhaVelha,$senhaNova){
		//primeiro verifica se a senha velha conrresponde com a senha que esta cadastrada no banco de dados
		$cmd = self::$pdo->prepare("SELECT id FROM cliente WHERE id = :id AND senha = :s");
		$cmd->bindValue(":id",$id);
		$cmd->bindValue(":s",$senhaVelha);
		$cmd->execute();

		if($cmd->rowCount() == 1){//senha correta
			//Alterando senha...
			$cmd = self::$pdo->prepare("UPDATE cliente SET senha = :sn WHERE id = :id");
			$cmd->bindValue(":id",$id);
			$cmd->bindValue("sn",$senhaNova);
			$cmd->execute();

			return true;
		}else{
			return false;
		}




	}
}