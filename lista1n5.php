<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dia</title>
</head>
<body>
    <form method="POST">
        Dia:<input type="number" name="dia"> <br>
		Mês:<input type="number" name="mes"> <br>
		Ano:<input type="number" name="ano"> <br>
        <input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>


<?php
/**Faça um formulário que tenha três campos, para receber o dia , o mês e um ano (não usar o tipo
date do HTML). Em seguida, faça a validação dos dados de entrada, não permitindo valores
inválidos.
a) Dica 1: usar uma função irá poupar linhas de códigos, pois as validações são parecidas;
b) Dica 2: usar um array facilitará o processo de saber a quantidade de dias do mês.**/

function vnumero($num, $max){
	if ($num >= 1 && $num<=$max)
		return true;
	else
		return false;
}

if (isset($_POST['enviar'])){
	if (vnumero($_POST['mes'], 12)==true){
		$mes = $_POST['mes'];
	} else{
		$mes = 1;
	}
	if (vnumero($_POST['ano'], 3000)==true){
		$ano = $_POST['ano'];
	} else{
		$ano = 2000;
	}
	$dias = array("", 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	echo("Mês $mes tem ". $dias[$mes]." dias");
	echo("<br>");
	
	if (vnumero($_POST['dia'], $dias[$mes])==true)
		$dia = $_POST['dia'];
	else
		$dia = 1;
		
	echo("$dia/$mes/$ano");
}
?>


