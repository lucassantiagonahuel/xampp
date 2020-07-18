<?php
	require_once 'BaseConexion.php';

	$conexion= new mysqli($host, $usu,$pass, $db) or 	die(mysql_error());
	$conexion->set_charset("utf8");


	$resultado=mysqli_query($conexion,"SELECT * FROM rubro") or
				die($conexion->error);

	$res['rubros']=$resultado->fetch_all(MYSQLI_ASSOC);
	echo json_encode($res);

	die();
?>