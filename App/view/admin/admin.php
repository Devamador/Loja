<?php
	session_start();
	if(!$_SESSION['email']){
		header('Location: login.php');
	}

	require_once '../../model/Produto.class.php';
	$produto = new Produto();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.min.css">
	<title>Loja</title>
</head>
<body>
	<div class="topo">
		<?php
			if(isset($_SESSION['email'])){


		?>
		<h2>Olá,<?php echo $_SESSION['email']; ?> <a href="../../controller/logout.php"><img class="img-logout" alt="imagem-logout" src="../../../public/img/img-logout.png"></a></h2>
		
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
			<li><a href="#">Home</a></li>
			<li><a href="#">Minha conta</a></li>
			<li><a href="pedido.php">Produto</a></li>
			<li><a href="#">Contato</a></li>
		</ul>
	</nav>
	<section id="content">
		<article>
			<?php

			$dados = $produto->buscarDados();

			for($i = 0;$i<count($dados);$i++){
			?>		
				<div class="item">
					<figure class="img-item">
						<img src="../../../public/img/produtos/<?php echo $dados[$i]['arquivo']; ?>" class="img-produto">
					</figure>		
					<div>
						<p class="nome-produto"><?php echo $dados[$i]['nome']; ?></p>
						<p class="preco-produto">R$ <?php echo $dados[$i]['preco']; ?></p>
					</div>	
					<a href="#" id="btn-comprar" class="btn btn-success">Comprar</a>	
				</div>
				<?php	
			}

				?>
		</article>
	</section>

	<footer>
		<script type="text/javascript" src="../../../bootstrap/jquery/jquery.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
	</footer>


</body>
</html>	