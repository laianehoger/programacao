
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mostrando os grupos da agenda</title>
	<style type="text/css">
		table{
			border-collapse:  collapse;
			width:  100%;
		}
		th{
			heigth: 30px;
			background-color:  lightcoral;
			color:  white;
		}
		th, td{
			padding:  15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover{
			background-color: #f5f5f5;
		}

		tr:nth-child(even){
			background-color: lavenderblush;
		}


	</style>
</head>
<body bgcolor="#FFFAFA">

	<?php
	$conn = mysqli_connect("127.0.0.1", "root", "", "agenda");
	
	if($conn){
		$sql = "SELECT * FROM grupos ORDER BY nome ASC";

		$registros = mysqli_query($conn, $sql);

		if (mysqli_num_rows($registros) > 0){
			
			echo ("<table><tr><th>Nome</th><th>Descrição</th></tr>");
			while($registro = mysqli_fetch_array($registros)){
				echo("<tr><td>$registro[nome]</td><td>$registro[descricao]</td></tr>");
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