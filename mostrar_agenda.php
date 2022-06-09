<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mostrando os contatos da agenda</title>
</head>
<body>
	<?php
	$conn = mysqli_connect("127.0.0.1", "root", "", "agenda");
	//testando
	if($conn){
		$sql = "SELECT * FROM contatos ORDER BY nome ASC";

		$registros = mysqli_query($conn, $sql);

		if (mysqli_num_rows($registros) > 0){
			//codigo p mostrar registros
			echo ("<table><tr><td>Nome</td><td>Email</td><td>Número</td></tr>");
			while($registro = mysqli_fetch_array($registros)){
				echo("<tr><td>$registro[nome]</td><td>$registro[email]</td><td>$registro[numero]</td></tr>");
			}
			echo("</table>");


		} else{
			echo("<h1>Não há nada para ser mostrado<h1>");
		}

		mysqli_close($conn);


	} else{
		echo("Houve um erro ao conectar com o banco de dados");
	}

	?>
</body>
</html>

