<?php

if (!defined('FRAMEWORK')) { die; }

/*
	En este archivo se encuentran todas las funciones
	de uso global
*/

function showvar($var, $debug = false){
	echo '<pre>';
	if (is_bool($var) or $debug) {
		var_dump($var);
	}else{
		print_r($var);
	}
	echo '</pre>';
} // function showvar

function clearText($txt){
	return htmlentities($txt, ENT_QUOTES, 'UTF-8');
} // function clearText

function loadJson($path, $as_array = true){
	if (!is_file($path)) {
		throw new Exception("No existe el archivo JSON indicado", 1);
	}

	$data = file_get_contents($path);

	$data = json_decode($data, $as_array);

	if (json_last_error() != JSON_ERROR_NONE) {
		showvar(json_last_error_msg());
		throw new Exception("Ocurrió un error al procesar el archivo JSON ".$path, 1);
	}

	return $data;
} // function loadJson
