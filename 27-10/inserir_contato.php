<?php
	require_once("protege.php");
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
			<legend>Adicionando um novo contato</legend>
			<div class="input-group">
				<label>Nome</label>
			 	<input type="text" name="nome">
			</div>
			<div class="input-group">
				<label>Data de nascimento</label>
				<input type="date" name="nascimento"> 
			</div>
			<div class="input-group">
				<label>Numero telefônico</label>
				<input type="text" name="numero"> 
			</div>
			<div class="input-group">
				<label>Email</label> 
				<input type="email" name="email" >
			</div>
			<div class="input-group">
				<label>Grupo</label>
				<select name="grupo">
					<?php
						require_once("conecta.php");						
						
						$sql = "SELECT * FROM grupos ORDER BY nome ASC";

						$registros = mysqli_query($conn, $sql);

						if (mysqli_num_rows($registros) > 0){

							while ($registro = mysqli_fetch_array($registros) ){
								echo("<option value='$registro[id]'>$registro[nome]</option>");
							}
						}							
					?>
				</select>
			</div>

			<input type="submit" name="enviar" value="Enviar" class="btn btn_primary">
		</fieldset>
	</form>
	
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
			$nome = $_POST["nome"];
			$nascimento = $_POST["nascimento"];
			$numero = $_POST["numero"];
			$email = $_POST["email"];
			$id_grupo = $_POST["grupo"];

			echo $sql = "INSERT INTO contatos (nome, numero, nasc, email, id_grupo) VALUES ('$nome', '$numero', '$nascimento', '$email', $id_grupo) ";
			// echo para debugar a consulta sql gerada
			// echo ($sql);

			// mandando executar a consulta sql
			// a funcao mysqli_query retorna true se a consulta foi executada com sucesso
			if (mysqli_query($conn, $sql)){
				$_SESSION["msg_sucesso"] = "Contato adicionado com sucesso!";
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