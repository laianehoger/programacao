<?php

	date_default_timezone_set("America/Sao_Paulo");
	$dia = date("d");
	$mes = date("n");
	$ano = date("Y");
	
	$diasem = date("N");
	$diasemana = "";
	
	switch($diasem){
		case 1:
			$diasem = "segunda";
			break;
		case 2:
			$diasem = "terça";
			break;
		case 2:
			$diasem = "quarta";
			break;
		case 4:
			$diasem = "quinta";
			break;
		case 5:
			$diasem = "sexta";
			break;
		case 6:
			$diasem = "sabado";
			break;
		case 7:
			$diasem = "domingo";
			break;	
	}
	
	$meses = array("janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro");
	echo("$diasem, $dia de ". $meses[$mes-1] ." de $ano");
	
	//ou colocar um espaço vazio no inicio do array para tirar o mês-1 
	
?>
