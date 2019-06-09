<?php
	session_start();
	require_once '../model/Produto.class.php';
	require_once '../model/Carrinho.class.php';
	$produto = new Produto();
	$carrinho = new Carrinho();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">  
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/carrinho.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<title>Loja</title>
</head>
<body>
	<div class="topo">
		<?php
			if(isset($_SESSION['email'])){


		?>
		<h2>Olá,<?php echo $_SESSION['email']; ?> <a href="../controller/logout.php"><img class="img-logout" alt="imagem-logout" src="../../public/img/img-logout.png"></a></h2>
		
		<?php
			}else{
				?>
					<a href="login.php"><img class="img-login" alt="imagem-login" src="../../public/img/img-login.png"></a>
				<?php
			}
		?>
	</div>
	<nav id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="minhaconta.php">Minha conta</a></li>
			<li><a href="carrinho.php">Carrinho</a></li>
			<li><a href="contato.php">Contato</a></li>
		</ul>
	</nav>
	<section id="content">
		<h3>Carrinho</h3>
	
				<table class="table">
					<thead class="">
						<tr>
							<td></td>
							<td>Produto</td>
							<td>Categoria</td>
							<td>Preço</td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						$idCliente = $_SESSION['id'];
						$dados=$carrinho->buscarDados($idCliente);
						for($i = 0;$i < count($dados);$i++) {
							$idP = $dados[$i]['idProduto'];
							$dadosProduto=$produto->buscarDadosProduto($idP);
					?>
						<tr>
						<td>
							<img class="img" alt="imagem" src="../../public/img/produtos/<?php echo $dadosProduto
							['arquivo'] ?>">
						</td>
						<td><?php echo $dadosProduto['nome'] ?></td>
						<td><?php echo $dadosProduto['categoria'] ?></td>
						<td><?php echo $dadosProduto['preco'] ?></td>

						</tr>
					<?php
						}			
					?>
					</tbody>
				</table>
	</section>
	<footer>
		<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
	</footer>

</body>
</html>	

