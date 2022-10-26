<?php
	session_start();

	session_destroy(); // encerra a sessão excluindo todas as variaveis criadas

	header("location: login.php");
?>
