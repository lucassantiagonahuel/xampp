<?php
	require_once 'BaseConexion.php';

	$conexion= new mysqli($host, $usu,$pass, $db) or 	die(mysql_error());
	$conexion->set_charset("utf8");

	$resultado=mysqli_query($conexion,
		"SELECT
			articulos.*,
			rubro.id as rubro_id,
			rubro.nombre as rubro_nombre
		FROM `articulos`
		LEFT JOIN `rubro` on articulos.id_rubro=rubro.id")
	or
	die($conexion->error);

	$res['articulos']=$resultado->fetch_all(MYSQLI_ASSOC);
	echo json_encode($res);

	die();

?>