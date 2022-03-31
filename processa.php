<?php
//isset testa se a variavel existe
	if(isset($_POST['enviar']) == true){
		//só executa se estiver definido
		
		//ver se foi preenchido
		if (empty($_POST["nome"]) ==  true){
			echo("pls preencha o campo <b>nome</b>");
			
		} 
		else if(empty($_POST["nascimento"]) ==  true){
			echo("pls preencha o campo <b>nascimento</b>");
			//echo("<script>alert("preencha a data de nascimento"); </script>");
		}
		else if(empty($_POST["numero"]) ==  true){
			echo("pls preencha o campo <b>numero</b>");
		}
		else if(empty($_POST["email"]) ==  true){
			echo("pls preencha o campo <b>email</b>");
		}
		else if(empty($_POST["senha"]) ==  true){
			echo("pls preencha o campo <b>senha</b>");
		}
		
		//else if($_POST["senha"]) == ($_POST["senhadnv"])  
		
		
		
		$nome = $_POST["nome"];
		$nascimento = $_POST["nascimento"];
		$numero = $_POST["numero"];
		$email = $_POST["email"];
		$senha = $_POST["senha"];

		echo("Dados recebidos");
		echo("<br>");
		echo("Nome: $nome<br>Data de nascimento: $nascimento <br> Número telefonico: $numero <br> Email: $email");
} else{
	//redirecionar a outra pagina
	header("localization: formulario.php");
	
}
	
?>
