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
	<link rel="stylesheet" type="text/css" href="../../../public/css/pedido.css">
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
			<p>Lista de Produtos</p>
			<a href="inserir-produto.php" class="btn btn-success" id="btn-inserir">inserir produto</a>
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

						$dados = $produto->buscarDados();

						for($i = 0;$i<count($dados);$i++){
							echo "<tr>";
							foreach ($dados[$i] as $key => $value) {
								# code...
								if($key != "id"){
									if($key == "arquivo"){
										?>
										<td ><img class="img" alt="imagem" src="../../../public/img/produtos/<?php echo $value ?>"></td>
										<?php

									}else{
										?>
										<td><?php echo $value ?></td>
										<?php	
									}
										
								}
									
							}

							?>
								<td><a href="update-produto.php?id=<?php echo $dados[$i]['id']; ?>"><img src="../../../public/img/img-alterar.png"></a></td>
								<td><a href="#" data-toggle="modal" data-target="#modal<?php echo $dados[$i]['id']; ?>" ><img src="../../../public/img/img-excluir.png"></a></td>

								<!-- Struct modal-->
			                    <div id="modal<?php echo $dados[$i]['id']; ?>" class="modal" tabindex="-1" role="dialog">
			                        <div class="modal-dialog" role="document">
			                          <div class="modal-content">
			                            <div class="modal-header">
			                              <h5 class="modal-title">Opa!</h5>
			                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                <span aria-hidden="true">&times;</span>
			                              </button>
			                            </div>
			                            <div class="modal-body">
			                              <p>Tem certeza que deseja excluir esse registro?</p>
			                            </div>
			                            <div class="modal-footer">
			                                <form action="../../controller/delete.php" method="post"> 
			                                    <input type="hidden" name="id" value="<?php echo $dados[$i]['id']; ?>">
			                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			                                    <button type="submit" name="btn-delete" class="btn btn-primary">Sim</button>
			                                </form>
			                            </div>
			                          </div>
			                        </div>
			                    </div>
							<?php
							echo "</tr>";

						}
													
					?>
					
				</tbody>	
			</table>


				
		</article>
	</section>
	<footer>
		<script type="text/javascript" src="../../../bootstrap/jquery/jquery.slim.min.js"></script>

		<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>
	</footer>

</body>
</html>	