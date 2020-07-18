<?php 

$numero1=$_POST["num1"];
$numero2=$_POST["num2"];
$operacion=$_POST["operacion"];

$suma=$numero1 + $numero2;
$resta=$numero1 - $numero2;
$multiplicacion= $numero1 * $numero2;
$division= $numero1 / $numero2;
$resto= $numero1 % $numero2;
$incremento=$numero1++;
$decremento=$numero2++;

switch ($operacion) {
    case 'Suma':
        echo $suma;
        break;
    case 'Resta':
        echo $resta;
        break;   
    case 'Multiplicacion':
        echo $multiplicacion;
        break;
    case 'Division':
        echo $division;
        break;
    case 'Resto':
        echo $resto;
        break; 
    case 'Incremento':
        echo $incremento;
        break;
    case 'Decremento':
        echo $decremento;
        break;
        
    default:
        echo "Nose eligio nada";
        break;
}



?>