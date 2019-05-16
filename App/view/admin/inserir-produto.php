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
			<p>Cadastro de Produto</p>
			<form action="inserir-produto.php" method="POST" enctype="multipart/form-data">
				<input type="file" required name="arquivo">
				<p><input type="text" name="nome_produto" required placeholder="nome do produto"></p>
				<p><input type="text" name="categoria" required placeholder="categoria"></p>
				<p><input type="text" name="preco" required placeholder="preco"></p>

				<input type="submit" name="btn-salvar" value="Salvar">

				
			</form>

			<?php
				if(isset($_POST['btn-salvar'])){
					$nome_produto = addslashes($_POST['nome_produto']);
					$categoria = addslashes($_POST['categoria']);
					$preco = addslashes($_POST['preco']);

					$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));//pega a extensão do arquivo
					$novo_nome = md5(time()) . $extensao;// define um nome para o arquivo
					$diretorio = "../../../public/img/produtos/";//define o diretorio para onde enviaremos o arquivo

					move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio . $novo_nome);//efetua o upload

					if($produto->cadastrarProduto($novo_nome,$nome_produto,$categoria,$preco)){
						echo "<script>alert('Produto cadastrado com sucesso');location.href = 'pedido.php'</script>";
					}
				}
			?>
		</article>
	</section>
	<footer>
		<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
	</footer>

</body>
</html>	