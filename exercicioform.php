<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<!--Elabore um formulário utilizando o método GET, que recebe
um número inteiro e escreve na tela se o número é par ou
ímpar. Faça a validação para garantir que os campos foram
preenchidos-->
	<form method="GET">
		<input type="number" name="numero">
		<input type="submit" name="enviar" value="verificar">
	</form>
	<?php
		if (isset($_GET['enviar'])){
			$numero = $_GET['numero'];
			if (isset($numero) && empty($numero) == false){
				if ($numero % 2 == 0)
					echo("numero $numero é <b>par</b>");
				else
					echo("numero $numero é <b>ímpar</b>");
			}
		}
	
	?>	
</body>
</html>
