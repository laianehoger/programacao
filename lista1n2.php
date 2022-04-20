<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Salário</title>
</head>
<body>
    <form method="POST">
        Valor por hora:<input type="number" name="vh"> <br>
		Hora mensal:<input type="number" name="hm"> <br>
        <input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>

<?php
if (isset($_POST['enviar'])){
    $valorh = $_POST['vh'];
    $horam = $_POST['hm'];
    if(!empty($valorh) && !empty($horam)){
        if(is_numeric($valorh) && is_numeric($horam)){
            
            $resultado = $valorh * $horam;
            
            //resultado
            echo("salário: $resultado");
        }
    }
}
?>