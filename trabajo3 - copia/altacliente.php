<?php
require("conexion.php");
$nombre = $_REQUEST['nombre'];
$respuesta = $conn->query("INSERT INTO clientes (id_cli,nombre_cli) VALUES (null, '".addslashes($nombre)."')");
mysqli_close($conn);
echo json_encode($respuesta);
?>