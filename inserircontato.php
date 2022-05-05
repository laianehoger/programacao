<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de usuário</title>
</head>
<body>
	<form method="POST">
		<fieldset>
			<legend>Adicionando um novo usuário</legend>
			Nome: <input type="text" name="nome" pattern="[a-z]*"> <br>
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
</body>
</html>

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
			// abre conexão com o banco
			$conn = mysqli_connect("127.0.0.1", "root", "", "agenda");
			// aqui as condicoes foram satisfeitas, ou seja, todos os campos foram preenchidos
			if($conn) {
				$nome = $_POST["nome"];
				$nascimento = $_POST["nascimento"];
				$numero = $_POST["numero"];
				$email = $_POST["email"];

				$sql = "INSERT INTO contatos (nome, num, nasc, email) VALUES ('$nome', '$numero', '$nascimento', '$email')";

				//echo($sql);


				if(mysqli_query($conn, $sql)){
					echo("contato adicionado");
				}
				else{
					echo("erro: $sql <br>" .mysqli_connect_error);
				}


			}
			else{
					//informando o erro
					echo("falha na conexão " .mysqli_connect_error($conn));

			}
		
		}
	}

?>