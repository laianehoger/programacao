<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<!--Elabore uma calculadora que recebe dados de um formulário
através do método POST e exibe o resultado na tela. Você
deve colocar um elemento do tipo select para permitir que o
usuário escolha a operação (soma, subtração, multiplicação
e divisão). Necessário validar as entradas.-->

	<form method="POST">
		Número 1:<input type="text" name="n1"> <br>
		Número 2:<input type="text" name="n2"> <br>
		Operação: 
		<select name="operacao">
			<option value="somar">Somar</option>
			<option value="subtracao" >Subtrair</option>
			<option value="multi" >Multiplicar</option>
			<option value="div" selected>Dividir</option> <!-- O SELECTED FAZ ESSA OPÇÃO ESTAR SELECIONADA POR PADRÃO-->
		</select>
		<input type="submit" name="enviar" value="Enviar">
	</form>
	<?php
		if (isset($_POST['enviar'])){
			$numero1 = $_POST['n1'];
			$numero2 = $_POST['n2'];
			if(!empty($numero1) && !empty($numero2)){
				if(is_numeric($numero1) && is_numeric($numero2)){
					$op = $_POST['operacao'];
					
					$resultado = 0;
					if ($op == "somar")
					$resultado = $numero1 + $numero2;
					else if ($op == "subtracao")
					$resultado = $numero1 - $numero2;
					else if ($op == "multi")
					$resultado = $numero1 * $numero2;
					else if ($op == "div")
					$resultado = $numero1 / $numero2;
					
					//resultado
					echo("resultado: $resultado");
				} else{	
					echo("apenas numeros permitidos");
			}
			 
			
		}else{
				echo("verifique os valores");
			}
	}
	?>
</body>
</html>
