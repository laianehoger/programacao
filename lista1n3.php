<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>peso ideal</title>
</head>
<body>
    <form method="POST">
    Altura:<input type="number" name="alt" step="0.01"> <br>
        <select name="sexo">
			<option value="h">Homem</option>
            <option value="m">Mulher</option>
		</select>
        <input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>

<?php
if (isset($_POST['enviar'])){
    $altura = $_POST['alt'];
        if(is_numeric($altura)){
            $sexo = $_POST['sexo'];

            if ($sexo == "h"){
				$resultado = (72.7 * $altura)- 58;
                echo("peso ideal: $resultado");
            }
			else if ($sexo == "m"){
				$resultado = (62.1* $altura) - 44.7;
                echo("peso ideal: $resultado");
            }
        }
    }
?>