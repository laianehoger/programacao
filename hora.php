<?php
	date_default_timezone_set("America/Sao_Paulo");
	$dia = date("d");
	$mes = date("n");
	$ano = date("Y");
	
	$meses = array("janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro");
	echo("$dia de ". $meses[$mes-1] ." de $ano");
	
	
?>

