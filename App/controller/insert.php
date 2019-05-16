<?php

require_once('../model/Cliente.class.php');

if(isset($_POST['btn-cadastrar'])){
	$nome =addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$senhac = md5($senha);//senha criptografada

	$cliente = new Cliente();

	if($nome == '' || $email == '' || $senha == ''){
		echo "<script> alert('Preencha todos os campos');location.href = '../view/login.php'</script>";
		
	}

	if($cliente->cadastrarCliente($nome,$email,$senhac)){
		echo "<script> alert('Cadastrado com sucesso'); location.href = '../view/login.php'</script>";
	}else{
		echo "<script>alert('email ja cadastrado'); location.href = '../view/login.php'</script>";
	}



}