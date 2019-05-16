<?php

require_once '../model/Produto.class.php';
$produto = new Produto();

if(isset($_POST['btn-atualizar'])){
	$id = addslashes($_GET['id']);
	$nome = addslashes($_POST['nome']);
	$categoria = addslashes($_POST['categoria']);
	$preco = addslashes($_POST['preco']);

	if($produto->updateProduto($id,$nome,$categoria,$preco)){
		echo "<script>alert('Produto atualizado');location.href='../view/admin/pedido.php'</script>";
	}

}