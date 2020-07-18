<?php

if (!defined('FRAMEWORK')) { die; }

/*
	Constantes de directorios
*/

$base_path = str_replace('public/index.php', '', @$_SERVER['SCRIPT_FILENAME']);
define("PATH_BASE", $base_path);

define("PATH_APPS", PATH_BASE.'apps/');
define("PATH_CONFIG", PATH_BASE.'config/');

define("PATH_CORE", PATH_BASE.'core/');
define("PATH_CORE_INCLUDES", PATH_BASE.'core/includes/');
define("PATH_CORE_CONTROLLERS", PATH_BASE.'core/controllers/');
define("PATH_CORE_MODELS", PATH_BASE.'core/models/');
define("PATH_CORE_VIEWS", PATH_BASE.'core/views/');

define("PATH_MODULES", PATH_BASE.'modules/');
define("PATH_PUBLIC", PATH_BASE.'public/');


/*
	Url base de la aplicación
*/

$protocolo = $_SERVER['REQUEST_SCHEME'].'://';
$subdir = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$base_url = $protocolo.$_SERVER['HTTP_HOST'].$subdir;
define("URL", $base_url);

$base_url_https = 'https://'.$_SERVER['HTTP_HOST'].$subdir;
define("URL_HTTPS", $base_url_https);

define("URL_HOST", $protocolo.$_SERVER['HTTP_HOST'].$subdir);
