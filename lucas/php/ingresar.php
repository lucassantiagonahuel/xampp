<?php
	require_once 'BaseConexion.php';

	$conexion= new mysqli($host, $usu,$pass, $db) or 	die(mysql_error());
	$conexion->set_charset("utf8");

	$nombre=$_POST['nombre'];
	$id_rubro = $_POST['id_rubro'];

	$resultado=mysqli_query($conexion,"INSERT INTO `articulos` (`id`, `nombre`, `id_rubro`) VALUES (NULL, '".$nombre."', '".$id_rubro."');") or
			   die($conexion->error);
			   
	echo json_encode($resultado);
?>