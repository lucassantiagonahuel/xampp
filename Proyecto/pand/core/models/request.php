<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

/*
	Obtiene los parámetros de las peticiones
*/

use \stdClass;

class Request{

	public $host = URL_HOST;
	public $path = '';
	public $method = null;
	public $params = null;

	function __construct(){
		$this->params = new \stdClass();

		$this->parseParams();
		$this->setMethod();
	} // constructor

	public function setMethod(){
		$this->method = @$_SERVER['REQUEST_METHOD'];
		$this->client_ip = @$_SERVER['REMOTE_ADDR'];
		$this->user_agent = @$_SERVER['HTTP_USER_AGENT'];
	} // setMethod

	public function parseParams(){
		$this->parseGetParams();
		$this->parsePostParams();
		$this->parsePutParams();
		$this->parseDeleteParams();
		$this->parseFiles();
		$this->parseBodyContent();
	} // parseParams

	private function parseGetParams(){
		if (!empty($_GET)) {
			foreach($_GET as $key => $value){
				$_GET[$key] = trim($value);
			}
		}

		$this->params->get = @$_GET;
		$this->path = rtrim($this->params->get['pand_request'], '/');

		unset($this->params->get['pand_request']);
	} // parseGetParams

	private function parsePostParams(){
		if (!empty($_POST)) {
			foreach($_POST as $key => $value){
				$_POST[$key] = trim($value);
			}
		}

		$this->params->post = @$_POST;
	} // parsePostParams

	private function parsePutParams(){
		if (!empty($_PUT)) {
			foreach($_PUT as $key => $value){
				$_PUT[$key] = trim($value);
			}
		}

		$this->params->put = @$_PUT;
	} // parsePutParams

	private function parseDeleteParams(){
		if (!empty($_DELETE)) {
			foreach($_DELETE as $key => $value){
				$_DELETE[$key] = trim($value);
			}
		}

		$this->params->delete = @$_DELETE;
	} // parseDeleteParams

	private function parseFiles(){
		$this->params->files = @$_FILES;
	} // parseFiles

	private function parseBodyContent(){
		$cont = file_get_contents('php://input');
		try{
			$cont = json_decode($cont, true);
		}catch(Exception $e){}

		$this->params->body = $cont;
	} // parseBodyContent

} // class
