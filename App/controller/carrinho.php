<?php
session_start();
if(!$_SESSION['email']){
	header("Location: ../view/login.php");
}
require_once '../model/Carrinho.class.php';
$carrinho = new Carrinho();

if(isset($_GET['id'])){
	$idCliente = $_SESSION['id'];
	$idProduto = addslashes($_GET['id']);
	if($carrinho->insert($idCliente,$idProduto)){
		echo "<script>alert('produto no carrinho');location.href = '../view/carrinho.php';</script>";
		//header('Location: ../view/carrinho.php');
	}else{
		echo "<script>alert('ERRO AO INSERIR NO CARRINHO');location.href = '../view/index.php';</script>";
	}

}