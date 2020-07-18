<?php
	require_once 'BaseConexion.php';

	$conexion= new mysqli($host, $usu,$pass, $db) or 	die(mysql_error());
	$conexion->set_charset("utf8");

	$id=$_POST['id'];


	$resultado=mysqli_query($conexion,"DELETE FROM articulos WHERE articulos.id='$id'") or
               die($conexion->error);

	$res['articulos']=$resultado->fetch_all(MYSQLI_ASSOC);
	echo json_encode($res);

	die();
?>