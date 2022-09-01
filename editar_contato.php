<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar contato</title>
</head>
<body>
	<?php 
		// primeiro é preciso buscar as informacoes do registro a ser editado
		$id_contato = $_GET['id_contato'];

		$conn = mysqli_connect("127.0.0.1", "root", "", "agenda");

		if ($conn) {
			$sql = "SELECT * FROM contatos WHERE id = $id_contato";

			$resultado = mysqli_query($conn, $sql);

			// a edicao vai retornar apenas uma linha, pois a busca é pela primary key da tabela
			if (mysqli_num_rows($resultado) == 1) {
				
				// pega os dados relativo a linha que retornou e armazenada na variável abaixo
				$contato = mysqli_fetch_array($resultado);

				// pegando o valor dos campos e salvando em variaveis para preencher o formulário
				$nome 	= $contato["nome"];
				$nasc 	= $contato["nasc"];
				$num 	= $contato["numero"];
				$email	= $contato["email"];
				$id_grupo = $contato["id_grupo"]; // necessário para pré-selecionar o grupo de um contato

			} else {
				echo ("Contato não encontrado");
			}
		} else {
			die("Falha na conexão " . mysqli_connect_error() );
		}
	?>
	<form method="POST" >
		<fieldset>
			<!-- para preencher os campos do formulário, é necessario printar os valores dentro do elemento VALUE -->>
			<legend>Editando contato de <b><?php echo ($nome); ?></b></legend>
			Nome: <input type="text" name="nome" value="<?php echo ($nome); ?>"> <br>
			Data de nascimento: <input type="date" name="nascimento" value="<?php echo ($nasc); ?>"> <br>
			Numero telefônico: <input type="text" name="numero" value="<?php echo($num); ?>"> <br>
			Email: <input type="email" name="email" value="<?php echo($email); ?>" > <br>
			<select name="grupo">
				<?php 
					$conn = mysqli_connect("127.0.0.1", "root", "", "agenda");

					if ($conn) {
						$sql = "SELECT * FROM grupos ORDER BY nome ASC";

						$registros = mysqli_query($conn, $sql);

						if (mysqli_num_rows($registros) > 0){
							while ($registro = mysqli_fetch_array($registros)){
								
								if ($registro["id"] == $id_grupo) {
									echo ("<option value='$registro[id]' selected>$registro[nome]</option>");
								} else {
									echo ("<option value='$registro[id]'>$registro[nome]</option>");
								}
							}
						}
					}
				?>
			</select>
			<input type="submit" name="enviar" value="Salvar">
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
			// não é mais preciso abrir a conexão com o BD, pois isso foi feito anteriormente e também já foi testado se a conexao foi bem sucedida 
			$nome = $_POST["nome"];
			$nascimento = $_POST["nascimento"];
			$numero = $_POST["numero"];
			$email = $_POST["email"];
			$grupo = $_POST["grupo"];	// campo que contém o id do grupo selecionado

			// para editar o registro, usa-se o UPDATE
			$sql = "UPDATE contatos SET nome = '$nome', nasc = '$nascimento', numero = '$numero', email = '$email', id_grupo = $grupo WHERE id = $id_contato";

			// echo para debugar a consulta sql gerada
			// echo ($sql);

			// mandando executar a consulta sql
			// a funcao mysqli_query retorna true se a consulta foi executada com sucesso
			if (mysqli_query($conn, $sql)){
				echo ("
					<script>
						alert('Contato editado com sucesso');
						location.href = 'mostrar_agenda.php';
					</script>
				");
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