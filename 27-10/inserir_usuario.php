<?php
	require_once("protege.php");
	require_once("conecta.php");	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de usuário</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<form method="POST" >
		<fieldset>
			<legend>Adicionando um novo usuário</legend>
			<div class="input-group">
				<label>Login</label>
			 	<input type="text" name="login">
			</div>
			<div class="input-group">
				<label>Senha</label>
				<input type="password" name="senha"> 
			</div>
			<div class="input-group">
				<label>Confirmação da senha</label>
				<input type="password" name="senhanovamente"> 
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email"> 
			</div>

			<input type="submit" name="enviar" value="Enviar" class="btn btn_primary">
		</fieldset>
	</form>
	
	<?php
	// isset testa se uma variavel existe
	if (isset($_POST['enviar']) == true) {
		// codigo a ser executado se a variavel estiver definida

		// usando a funcao empty para saber se um campo foi preenchido
		if (empty($_POST["login"]) == true) {
			echo ("Por favor preencha o campo <b>login</b>");
		} else if (empty($_POST["senha"])){
			echo("Preencha a data de <b>senha</b>");
		} else if (empty($_POST["senhanovamente"])) {
			echo("Preencha o <b>confirmação de senha</b>");
		} else if (($_POST["senha"]) != ($_POST["senhanovamente"])) {
             $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
             echo $mensagem;
        } else if(empty($_POST["email"])){
			echo("Preencha o <b>email</b>");
		} else {

			$login = mysqli_real_escape_string($conn, $_POST["login"]);
			$senha = mysqli_real_escape_string($conn, $_POST["senha"]);
			$senhanovamente = mysqli_real_escape_string($conn, $_POST["senhanovamente"]);
			$email = mysqli_real_escape_string($conn, $_POST["email"]);


			$criptografia = md5($senha);	// criptografia com md5

  
			echo $sql = "INSERT INTO usuarios (login, senha, email) VALUES ('$login', '$criptografia', '$email') ";
			// echo para debugar a consulta sql gerada
			// echo ($sql);

			// mandando executar a consulta sql
			// a funcao mysqli_query retorna true se a consulta foi executada com sucesso
			if (mysqli_query($conn, $sql)){
				$_SESSION["msg_sucesso"] = "Usuário adicionado com sucesso!";
				header("location: mostrar_agenda.php");
			} else {
				// erro ao executar a consulta
				echo ("Erro: $sql <br>" . mysqli_error($conn) );
			}

			// encerrando a conexao
			mysqli_close($conn);
			
		}
	} 
	?>
</body>
</html>