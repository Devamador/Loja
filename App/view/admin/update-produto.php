<?php
	session_start();
	if(!$_SESSION['email']){
		header('Location: login.php');
	}

	include_once '../../model/Produto.class.php';

	$produto = new Produto();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">  
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
					<a href="login.php"><img class="img-login" alt="imagem-login" src="../../../public/img/img-login.png"></a>
				<?php
			}
		?>
	</div>
	<nav id="menu">
		<ul>
			<li><a href="admin.php">Home</a></li>
			<li><a href="#">Minha conta</a></li>
			<li><a href="pedido.php">Produto</a></li>
			<li><a href="#">Contato</a></li>
		</ul>
	</nav>

	<section id="content">
		<article>
			<?php
				if(isset($_GET['id'])){
					$id = addslashes($_GET['id']);
					$dados = $produto->buscarDadosProduto($id);
			?>
					<form action="../../controller/update.php?id=<?php echo $id ?>" method="POST">
						<p><img width="200px" src="../../../public/img/produtos/<?php echo $dados['arquivo'] ?>"></p>
						<p><label>Produto:</label><input type="text" name="nome" value="<?php echo $dados['nome']?>"></p>
						<p><label>Categoria:</label><input type="text" name="categoria" value="<?php echo $dados['categoria'] ?>"></p>
						<p><label>Preço:</label><input type="text" name="preco" value="<?php echo $dados['preco'] ?>"></p>

						<p><input type="submit" name="btn-atualizar" value="Atualizar"></p>
					</form>
			<?php		
				}
			?>
		</article>
	</section>
	<footer>
		<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
	</footer>

</body>
</html>	