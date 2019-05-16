<?php
session_start();
require_once '../model/Cliente.class.php';



if(isset($_POST['btn-login'])){//se apertou no botão login
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$senhac = md5($senha);

	$cliente = new Cliente();

	if($cliente->buscaCliente($email,$senhac)){
		$_SESSION['email'] = $email;
		$res = $cliente->buscaDados($email,$senhac);
		$_SESSION['id'] = $res['id'];
		
		if($res['admin'] == 1){
			header('Location: ../view/admin/admin.php');
		}else{
			header('Location: ../view/index.php');	
		}
		
		
	}else{
		echo "<script>alert('Usuario ou senha incorreta!'); location.href = '../view/login.php'</script>";
	}



}
