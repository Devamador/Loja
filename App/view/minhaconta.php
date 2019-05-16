<?php
	session_start();
	if(!$_SESSION['email']){
		header('Location: login.php');
	}
	require_once '../model/Cliente.class.php';

	$cliente = new Cliente();
	$res = $cliente->buscaDadosCliente($_SESSION['id']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">  
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/meusdados.css">
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
			<li><a href="#">Carrinho</a></li>
			<li><a href="#">Contato</a></li>
		</ul>
	</nav>
	<section id="content">
		<article>
			<p>Olá,<span> <?php echo $res['nome']; ?></span>. O que você quer fazer?</p>
			<div class="butoes">
				<a href="minhaconta.php" class="btn btn-success" name="btn-minha-conta">Minha conta</a>
				<a href="meus-dados.php" class="btn btn-success">Meus dados</a>
				<a href="alterar-senha.php" class="btn btn-warning">Alterar senha</a>
			</div>
		</article>
	</section>
	<footer>
		<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
	</footer>

</body>
</html>	