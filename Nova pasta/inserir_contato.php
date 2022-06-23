<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de usuário</title>
</head>
<body>
	<form method="POST" >
		<fieldset>
			<legend>Adicionando um novo usuário</legend>
			Nome: <input type="text" name="nome"> <br>
			Data de nascimento: <input type="date" name="nascimento"> <br>
			Numero telefônico: <input type="text" name="numero"> <br>
			Email: <input type="email" name="email" > <br>
			<input type="submit" name="enviar" value="Enviar">
		</fieldset>
	</form>
	<style type="text/css">
		input:invalid {
			animation: shake 300ms;
		}
		@keyframes shake {
			25% { transform: translateX(4px) ; }
			50% { transform: translateX(-4px); }
			25% { transform: translateX(4px); }
		}
	</style>
	<?php
	// isset testa se uma variavel existe
	if (isset($_POST['enviar']) == true) {
		// codigo a ser executado se a variavel estiver definida

		// usando a funcao empty para saber se um campo foi preenchido
		if (empty($_POST["nome"]) == true) {
			echo ("Por favor preencha o campo <b>nome</b>");
		} else if (empty($_POST["nascimento"])){
			// exibindo a mesagem de erro com javascript
			//echo("<script>alert('Preencha a data de nascimento');</script>");
			echo("Preencha a data de <b>nascimento</b>");
		} else if (empty($_POST["numero"])) {
			echo("Preencha o <b>número telefônico</b>");
		} else if(empty($_POST["email"])){
			echo("Preencha o <b>email</b>");
		} else {
			// abre a conexao com o banco de dados
			$conn = mysqli_connect("localhost", "root", "", "agenda");

			// testa se a conexao com o banco de dados foi bem sucedida
			if ($conn) {
				$nome = $_POST["nome"];
				$nascimento = $_POST["nascimento"];
				$numero = $_POST["numero"];
				$email = $_POST["email"];

				$sql = "INSERT INTO contatos (nome, numero, nascimento, email) VALUES ('$nome', '$numero', '$nascimento', '$email') ";
				// echo para debugar a consulta sql gerada
				// echo ($sql);

				// mandando executar a consulta sql
				// a funcao mysqli_query retorna true se a consulta foi executada com sucesso
				if (mysqli_query($conn, $sql)){
					echo ("Contato adicionado com sucesso!<br>");
				} else {
					// erro ao executar a consulta
					echo ("Erro: $sql <br>" . mysqli_error($conn) );
				}

				// encerrando a conexao
				mysqli_close($conn);
			} else {
				// informando qual o erro que houve na hora da conexao
				echo ("Falha na conexão " . mysqli_connect_error() );
			}
	


		}
	} 
	?>
</body>
</html>