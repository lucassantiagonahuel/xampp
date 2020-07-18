<?php
require ("conexion.php");
$nombre = $_REQUEST["nombre"];
$direccion = $_REQUEST["direccion"];
$cantidad = $_REQUEST["cantidad"];
$color = $_REQUEST["color"];
$fecha = $_REQUEST["fecha"];

$respuesta = $conn->query("INSERT INTO pedidos (id,nombre,direccion,cantidad,color,fecha) VALUES (null, '$nombre','$direccion','$cantidad','$color','$fecha')");

echo json_encode($respuesta);


?>

