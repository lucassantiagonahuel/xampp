<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

use \ReflectionMethod as ReflectionMethod;
use \stdClass as stdClass;

/*
	Objeto principal de la aplicación
*/

class Core{

	public $request = null;
	public $view = null;
	public $currentHost = null;
	public $currentApp = null;

	public $config = null;
	public $database = null;
	public $session = null;
	public $modules = [];

	public $debug = false;

	private function fixArrayParams($params){
		if (count($params) == 1 and empty($params[0])) {
			$params = array();
		}

		if (empty(end($params))) {
			array_pop($params);
		}

		return $params;
	}

	private function checkIfParamIsController($path, $params){
		if (empty($params)) {
			return false;
		}

		$tmp = $path.$params[0].'.php';

		return is_file($tmp);
	}

	public function __construct(){
        $this->config = new stdClass();
    }

	public function loadSession(Session $session){
		$this->session = $session;
	}

	public function loadRequest(Request $Request){
		$this->request = $Request;
	}

	public function loadRoles(Roles $Roles){
		$this->roles = $Roles;
	}

	public function loadView(View $view){
		$this->view = $view;
	}

	public function loadUserModel(modules\auth\models\User $usr){
		$this->user = $usr;
	}

	public function loadConfig(){
		require_once(PATH_CONFIG.'config.php');
	}

	public function loadApplications(){
		$this->applications = loadJson(PATH_CONFIG.'applications.json', false);
	}

	public function setCurrentApplication(){
		if (empty($this->applications)) {
			throw new Exception("No se registran aplicaciones en el framework");
		}

		$current_host = explode('://', $this->request->host)[1];
		$current_app = DEFAULT_APP;

		$break = false;
		foreach ($this->applications as $app) {
			foreach ($app->url as $modo => $url) {
                if ($url == $current_host) {
                    $current_app = $app->path;

					if ($modo == 'dev') {
						$this->debug = true;
					}

					$this->mode = $modo;

					$break = true;
					break;
                }
			}

			if ($break) { break; }
		}

        $this->currentApp = $current_app;
        $this->currentHost = $current_host;
	}

    public function loadAppConfig(){
        $base_path = PATH_APPS.$this->currentApp.'/config/*.php';
        foreach(glob($base_path) AS $configFile){
            require_once($configFile);
        }
    }

	public function loadModuleConfig($module){
		$base_path = PATH_MODULES.$module.'/config/*.php';
		foreach(glob($base_path) AS $configFile){
			require_once($configFile);
		}
	}

	public function setDatabase($db){
		$this->database = $db;
	}

	public function setDebugLevel(){
		return error_reporting(E_ALL);

		if ($this->debug) {
			error_reporting(E_ALL);
		}else{
			error_reporting(0);
		}
	}

    public function getController(){
        // separar los parámetros de la petición
        $params = explode('/', $this->request->path);

        // controlador por omisión
        $base_path = PATH_APPS.$this->currentApp.'/controllers/';
        $file = 'index';

        // método por omisión
        $method = 'index';

		// namespace de las aplicaciones
		$namespace = $this->currentApp.'App\\';

        // ver si el primer parámetro es un controlador
        if ($this->checkIfParamIsController($base_path, $params)) {
			$file = $params[0];
            array_shift($params);
        }

		// ver si el primer parámetro es un módulo
		if (!empty($this->modules) and !empty($params)) {
			foreach ($this->modules as $module) {
				if ($module->path === $params[0]) {
					// cambio el path a los módulos
					$file = 'index';
					$base_path = PATH_MODULES.$module->module.'/controllers/';

					$namespace = 'pand\\modules\\'.$module->module.'\\controllers\\';

					array_shift($params);

					$params = $this->fixArrayParams($params);

					// veo si va a otro controlador dentro del módulo
					if ($this->checkIfParamIsController($base_path, $params)) {
						$file = $params[0];
		                array_shift($params);
		            }

					// cargo la configuración del módulo
					$this->loadModuleConfig($module->module);

					break;
				}
			}
		}


        // incluir el archivo
		$fileController = $base_path.$file.'.php';
        require_once($fileController);

        // nombre de la clase
        $className = $namespace.$file.'Controller';

        // instanciar la clase
        $controller = new $className;

        // ver si el método es ejecutable y público
        if (!empty($params)) {
            $tmp_method = $params[0];

            if (method_exists($controller, $tmp_method)) {
                $reflectionMethod = new ReflectionMethod($controller, $tmp_method);
                if ($reflectionMethod->isPublic()) {
                    array_shift($params);
                    $method = $tmp_method;
                }
            }
        }

        // arreglo la cantidad de parametros
		$params = $this->fixArrayParams($params);

        // ver si coinciden la cantidad de argumentos
        $reflectionMethod = new ReflectionMethod($controller, $method);
        $requiredParams = $reflectionMethod->getNumberOfRequiredParameters();
        $noRequiredParams = $reflectionMethod->getNumberOfParameters();

		// si los parámetros no coinciden, correr 404 de la aplicación
        if (count($params) != $requiredParams AND count($params) > $noRequiredParams) {
			$method = 'notFound';
            $params = array();
			$className = $this->currentApp.'App\\indexController';
			$fileController = PATH_APPS.$this->currentApp.'/controllers/index.php';
        }

		$res = new \stdClass();
		$res->file = $fileController;
		$res->class = $className;
		$res->method = $method;
		$res->params = $params;

		return $res;
    } // getController

	public function runModuleController($moduleName, $class, $action = 'index', $params = array()){
		$fileController = PATH_MODULES.$moduleName.'/controllers/'.$class.'.php';
		$className = 'pand\modules\\'.$moduleName.'\controllers\\'.$class.'Controller';

		$controller = (object) array(
			"file" => $fileController,
			"class" => $className,
			"method" => $action,
			"params" => $params,
		);

		$this->runController($controller);
	}

	public function runController($controllerData){
		require_once($controllerData->file);

		$paramsController = array(
			new $controllerData->class,
			$controllerData->method,
		);

		call_user_func_array($paramsController, $controllerData->params);
	}

	public function getControllerDataUnauthorized(){
		$controllerData = new \stdClass();

		$controllerData->file = PATH_APPS.$this->currentApp.'/controllers/index.php';
		$controllerData->class = $this->currentApp.'App\\indexController';
		$controllerData->method = 'unauthorized';
		$controllerData->params = array();

		return $controllerData;
	}

	public function getControllerDataLogin(){
		$controllerData = new \stdClass();

		$controllerData->file = PATH_MODULES.'auth/controllers/index.php';
		$controllerData->class = 'pand\\modules\\auth\\controllers\\indexController';
		$controllerData->method = 'index';
		$controllerData->params = array();

		return $controllerData;
	}

} // class
