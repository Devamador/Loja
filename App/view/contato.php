<?php
	session_start();

	require_once '../model/Cliente.class.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">  
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/contato.css">
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
			<li><a href="contato.php">Contato</a></li>
		</ul>
	</nav>
	<section id="content">
		<div class="contato">
			<h3>Formulario do contato</h3>
			<form class="form">
				<input class="field" type="text" name="email" placeholder="Email">
				<input class="field" type="text" name="name" placeholder="Nome">
				<textarea class="field" name="mensage" placeholder="Digite sua menssagem aqui."></textarea>
				<input type="submit" name="" value="Enviar">

			</form>
			
		</div>

	</section>
	<footer>
		<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
	</footer>

</body>
</html>	