<?php
$l1=intval($_POST["lado1"]);
$l2=intval($_POST["lado2"]);
$l3=intval($_POST["lado3"]);
$n='1';
 if ($l1<$n or $l2<$n or $l3<$n)
   {
     echo "Nose pueden ingresar valores menores o iguales a 0";
   }

  elseif ($l1==$l2 and $l1==$l3)
   {
   	 echo "El triangulo es equilatero";
   }
  elseif ($l1==$l2 or $l1==$l3 or $l2==$l3)
   {
 	 echo "el tringulo es isoceles";
   }
  else
     echo "el triangulo es escaleno";
?>
<br>

<button class="btn btn-danger" onclick="history.go(-1);">Volver</button>