<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet"  href="../../public/css/login.css">
	<title>Login</title>
</head>
<body>
	<div class="topo">
		<hgroup>
			<h2>Loja virtual</h2>
			<h3>Cadastro</h3>
		</hgroup>
	</div>
	<div class="section">
		<div class="cadastrar">
			<form action="../controller/insert.php" method="POST">
				<fieldset>
					<legend>Criar Conta</legend>
					
					<label>Nome</label><input type="text" name="nome">
					<label>Email</label><input type="text" name="email">
					<label>Senha</label><input type="password" name="senha">
				</fieldset>
				

				<input type="submit" name="btn-cadastrar" value="cadastrar">
			</form>	
		</div>

		<div id="login">
			<form action="../controller/valida.php" method="POST">
				<fieldset>
					<legend>Login</legend>

					<label>Email</label><input type="text" name="email">
					<label>Senha</label><input type="password" name="senha">
				</fieldset>
				<input type="submit" name="btn-login" value="login">
			</form>	
			<p><a href="#">Esqueceu sua senha?</a></p>

		</div>
	</div>
</body>
</html>