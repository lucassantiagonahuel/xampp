<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

class View{

	public function __construct(){}

	private function loadFile($file_name, $path = null){
		$file_name .= '.php';

		if ($path != null) {
			$file_name = $path.$file_name;
		}

		try{
			include_once($file_name);
		}catch(Exception $e){}
	}

	/**************************************
				Carga de vistas
	**************************************/

	public function load($file_name){
		global $App;
		$path = PATH_APPS.$App->currentApp.'/views/';
		$this->loadFile($file_name, $path);
	}

	public function loadFromCore($file_name){
		$this->loadFile($file_name, PATH_CORE_VIEWS);
	}

	public function loadFromModule($file_name, $module){
		$path = PATH_MODULES.$module.'/views/';
		$this->loadFile($file_name, $path);
	}

	public function show($fnc, $params = array()){
		if (!is_array($params)) {
			$params = array($params);
		}
		call_user_func_array('views\\'.$fnc, $params);
	}

	/**************************************
				Carga de estilos
	**************************************/
	public function loadStyle($file_name){
		global $App;
		$path = PATH_APPS.$App->currentApp.'/styles/';
		$this->loadFile($file_name, $path);
	}

	public function loadStyleFromModule($file_name, $module){
		$path = PATH_MODULES.$module.'/styles/';
		$this->loadFile($file_name, $path);
	}

	/**************************************
				Carga de scripts
	**************************************/
	public function loadScript($file_name){
		global $App;
		$path = PATH_APPS.$App->currentApp.'/scripts/';
		$this->loadFile($file_name, $path);
	}

	public function loadScriptFromModule($file_name, $module){
		$path = PATH_MODULES.$module.'/scripts/';
		$this->loadFile($file_name, $path);
	}

}
