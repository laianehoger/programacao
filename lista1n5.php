<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dia</title>
</head>
<body>
    <form method="POST">
        Dia:<input type="number" name="d"> <br>
		Mês:<input type="number" name="m"> <br>
		Ano:<input type="number" name="a"> <br>
        <input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>


<?php
/**Faça um formulário que tenha três campos, para receber o dia , o mês e um ano (não usar o tipo
date do HTML). Em seguida, faça a validação dos dados de entrada, não permitindo val ores
inválidos.
a) Dica 1: usar uma função irá poupar linhas de códigos, pois as validações são parecidas;
b) Dica 2: usar um array facilitará o processo de saber a quantidade de dias do mês.**/


function data($d, $m, $a){
	$dias = array("", 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	$meses = array("", "janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro");
	echo("$d de $meses[$m] de $a");
}


if (isset($_POST['enviar'])){
	$dia = $_POST['d'];
	$mes = $_POST['m'];
	$ano = $_POST['a'];
	$data = data($dia, $mes, $ano);
	if (!empty($d) && !empty($m) && !empty($a)) {
		if (is_numeric($d) && is_numeric($m) && is_numeric($a)){
			


		}
		else {
			echo ("Verifique os dados digitados. Apenas números são permitidos.");
		}
	}else {
		echo("Por favor, verifique os valores digitados");
	}
}
?>