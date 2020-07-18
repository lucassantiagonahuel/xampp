<?php
	require_once 'BaseConexion.php';

	$conexion= new mysqli($host, $usu,$pass, $db) or 	die(mysql_error());
	$conexion->set_charset("utf8");

$nombre=$_POST['nombre'];
	$resultado=mysqli_query($conexion,"INSERT INTO rubro VALUES (null,'.$nombre.')") or
               die($conexion->error);

$res['rubros']=$resultado->fetch_all(MYSQLI_ASSOC);
	if ($resultado>0) {
		$res['rubros']=$resultado->fetch_all(MYSQLI_ASSOC);
	}
	echo json_encode($res);
	die();

?>