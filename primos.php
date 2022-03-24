<?php
	$primos = 0;
	$n = 2;
	
	do {
		$ehprimo = true;
		for ($i = 2; $i < $n; $i++){
			if ($n % $i == 0){
					$ehprimo = false;
					break;
			}
		}
		if ($ehprimo == true){
			echo("$n<br>");
			$primos++;
		}
		$n++;
	} while ($primos <10);
?>
