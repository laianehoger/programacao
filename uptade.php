<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar grupo</title>
</head>
<body>
	<?php 
		$id_grupo = $_GET['id_grupo'];
		$conn = mysqli_connect("127.0.0.1", "root", "", "agenda");

		if ($conn) {
			$sql = "SELECT * FROM grupos WHERE id = $id_grupo";

			$resultado = mysqli_query($conn, $sql);
			if (mysqli_num_rows($resultado) == 1) {
				$grupo = mysqli_fetch_array($resultado);
				$nome 	= $grupo["nome"];
				$descricao 	= $grupo["descricao"];			
			} else {
				echo ("Grupo não encontrado");
			}
		} else {
			die("Falha na conexão " . mysqli_connect_error() );
		}
	?>
	<form method="POST" >
		<fieldset>
			<!-- para preencher os campos do formulário, é necessario printar os valores dentro do elemento VALUE -->>
			<legend>Editando grupo</legend>
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
	
	<?php
	if (isset($_POST['enviar']) == true) {
			$grupo = $_POST["grupo"];
			$sql = "UPDATE grupos SET nome = '$nome', descricao = '$descricao' WHERE id = $id_grupo";
			if (mysqli_query($conn, $sql)){
				echo (" Editado! ");
			} else {
				echo ("Erro: $sql <br>" . mysqli_error($conn) );
			}
			mysqli_close($conn);
	} 
	?>
</body>
</html>