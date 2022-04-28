<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>imc</title>
</head>
<body>
    <form method="POST">
        Peso:<input type="number" name="p" step="0.01"> <br>
		Altura:<input type="number" name="a" step="0.01"> <br>
        <input type="submit" name="enviar" value="Enviar">
	</form>
</body>
</html>

<?php
// Elabore uma página que lê duas informações: peso e altura de um individuo e em seguida,
//calcule o Índice de Massa Corpóre a do indivíduo, apresentando o resultado na tela , por exemplo,
//“Seu IMC é 22,3 sendo considerado no rmal ”. Utilize uma função para isso A formula para
//cálculo do IMC é IMC = Peso ÷ (Altura × Altura)

function imc($peso, $altura){
    $imc = $peso / ($altura * $altura);
    return $imc;
}

if (isset($_POST['enviar'])){
    $altura = $_POST['a'];
    $peso = $_POST['p'];
    $imc = imc($peso, $altura);
	$imc = number_format($imc, 1, '.', '');
	
    if ($imc < 18.5){
        echo("Magreza, imc: $imc");
    }
    else if ($imc >= 18.5 && $imc >= 24.9){
        echo("Normal, imc: $imc");
    }
    else if ($imc >= 25 && $imc >= 29.9){
        echo("Sobrepeso, imc: $imc");
    }
    else if ($imc >= 30 && $imc >= 39.9){
        echo("Obesidade, imc: $imc");
    }
    else if ($imc > 40){
        echo("Obesidade grave, imc: $imc");
    }

}
    



?>
