<?php

if (!defined('FRAMEWORK')) { die; }

/*
	Carga de clases del core, apps y módulos
*/

function cargarClases($nombre){
	$paths = array(
		PATH_CORE_MODELS,
		PATH_CORE_CONTROLLERS,
		PATH_CORE_INCLUDES,
	);

	$class = strtolower($nombre);

	// si es para los modelos de un módulo
	if (strpos($class, '\\modules\\') > 0) {
		$modulo = explode('\\', $class)[2];

		$folder = (strpos($class, '\\controllers\\'))?'controllers':'models';
		$paths[] = PATH_MODULES.$modulo.'/'.$folder.'/';
	}

	// esto es para escapar los namespaces
	$class = explode('\\', $class);
	$class = end($class);

	$class = str_replace('controller', '', $class);

	foreach ($paths as $path) {
		$file = $path.$class.'.php';

		if (is_file($file)) {
			include_once($file);
			return;
		}
	}

	showvar('No se encontró la clase para cargar: '.$nombre);
	showvar($class);
	showvar($paths);

} // function cargarClases

spl_autoload_register('cargarClases');
