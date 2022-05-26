<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de usuário</title>
</head>
<body>
	<div id="area">
	<form method="POST" id="form">
		<fieldset>
			Nome: <input type="text" name="nome" pattern="[a-z]*"required >
			<br>
			Data de nascimento: <input type="date" name="nascimento"required>
			<br>
			Endereço: <input type="text" name="numero"required>
			<br>
			Email: <input type="email" name="email"required>
			<br>
			Salário: <input type="text" name="salario"required>
			<br>
			Escolaridade: <input type="text" name="escolaridade"required>
			<br>
			Login: <input type="text" name="login"required>
			<br>
			Senha: <input type="password" name="senha"required>
			<input type="submit" name="enviar" value="Enviar">
		</fieldset>
	</form>
	</div>
<style type="text/css">
	body {
	background-color: lightblue;
	}
	form{
	position:center;
	display:block;
	}
</style>
</body>
</html>

<?php
if (isset($_POST['enviar'])){
	if (empty($_POST["nome"])) {
		echo ("Por favor preencha o campo <b>nome</b>");
	} 
	
	else if (empty($_POST["nascimento"])){
		echo("Preencha a data de <b>Nascimento</b>");
	} 
	
	else if (empty($_POST["endereco"])) {
		echo("Preencha o <b>Endereço</b>");
	} 
	
	else if(empty($_POST["email"])){
		echo("Preencha o <b>Email</b>");
	} 
	
	else if(empty($_POST["salario"])){
		echo("Preencha o <b>Salario</b>");
	} 
	
	else if(empty($_POST["escolaridade"])){
		echo("Preencha o <b>Escolaridade</b>");
	} 
	
	else if(empty($_POST["login"])){
		echo("Preencha o <b>Login</b>");
	} 
	
	else if(empty($_POST["senha"])){
		echo("Preencha o <b>Senha</b>");
	} 
	
	else {
	//tudo preenchido
	$nome = $_POST["nome"];
	$nascimento = $_POST["nascimento"];
	$endereco = $_POST["endereço"];
	$email = $_POST["email"];
	$salario = $_POST["salario"];
	$escolaridade = $_POST["escolaridade"];
	$login = $_POST["login"];
	$senha = $_POST ["senha"];
	}
    if(!is_numeric("$salario")){
            echo("salário inválido. insira um número");
        }
	}

?>
