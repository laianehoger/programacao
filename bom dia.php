<?php
	$hora = date("H");
	//echo($hora);
	
	if ((date("H")) > 12 && (date("H"))< 18){
		echo("boa tarde");
	}
	else if ((date("H")) > 06 && (date("H")) <= 12){
		echo("bom dia");
	} 
	else{
		echo("boa noite");
	}
	
?>
