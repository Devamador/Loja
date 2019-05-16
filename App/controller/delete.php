<?php

require_once '../model/Produto.class.php';
$produto = new Produto();

if(isset($_POST['btn-delete'])){
	$id = addslashes($_POST['id']);

	if($produto->deleteProduto($id)){
		header('Location: ../view/admin/pedido.php');
		exit();	
	}

	
}