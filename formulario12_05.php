<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de usuários</title>
</head>
<body>
	<form method="POST" >
		<fieldset>
			<legend>Cadastro de usuários</legend>
			Nome: <input type="text" name="nome"> <br>
			Data de nascimento: <input type="date" name="nascimento"> <br>
			Email: <input type="email" name="email"> <br>
			Endereço: <input type="text" name="endereco"> <br>
			Salario: <input type="text" name="salario"> <br>
			Escolaridade: <input type="text" name="escolaridade"> <br>
			Login: <input type="login" name="login"> <br>
			Senha: <input type="password" name="senha"> <br>
			<input type="submit" name="enviar" value="Enviar">
		</fieldset>
	</form>
	<?php
	// isset testa se uma variavel existe
	if (isset($_POST['enviar'])) {
		if (empty($_POST["nome"])) {
			echo ("Preencha o <b>nome</b>");
		} else if (empty($_POST["nascimento"])){
			echo("Preencha a data de <b>nascimento</b>");
		} else if (empty($_POST["email"])) {
			echo("Preencha o <b>email</b>");
		} else if(empty($_POST["endereco"])){
			echo("Preencha o <b>endereco</b>");
		} else if(empty($_POST["salario"])){
			echo("Preencha o <b>salario</b>");
		} else if(empty($_POST["escolaridade"])){
			echo("Preencha a <b>escolaridade</b>");
		} else if(empty($_POST["login"])){
			echo("Preencha o <b>login</b>");
		} else if(empty($_POST["senha"])){
			echo("Preencha a <b>senha</b>");
		} 
		
		if(!is_numeric($_POST['salario'])){
				echo("O <b>salário</b> deve ser numérico");
			}
	
		else {

			$nome = $_POST["nome"];
			$nascimento = $_POST["nascimento"];
			$email = $_POST["email"];
			$salario = $_POST["salario"];
			$escolaridade = $_POST["escolaridade"];
			$login = $_POST["login"];
			$senha = $_POST["senha"];

			
		}
	} 
	?>
</body>
</html>

