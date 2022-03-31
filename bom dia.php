<?php
	date_default_timezone_set("America/Sao_Paulo");
	$hora = date("H");
	echo($hora);
	
	if ($hora > 12 && $hora < 18){
		echo("boa tarde");
	}
	else if ($hora > 06 && $hora <= 12){
		echo("bom dia");
	} 
	else{
		echo("boa noite");
	}
	
?>
