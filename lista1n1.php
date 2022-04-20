<?php
//Chico tem 0.8 m e cresce 6 centímetros por ano, enquanto Juca tem 0.6m e cresce 9
//centímetros por ano. Construa um algoritmo que calcule e imprima quantos anos serão
//necessários para que Juca seja maior que Chico .

$chico = 0.8;
$juca = 0.6;
$cont = 0;

while ($chico > $juca){
     $chico = $chico + 0.06;
     $juca = $juca +0.09;
     $cont++;
}

echo($cont);


?>