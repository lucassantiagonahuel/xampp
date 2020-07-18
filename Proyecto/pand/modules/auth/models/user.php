<?php
namespace pand\modules\auth\models;

if (!defined('FRAMEWORK')) { die; }

class User extends \pand\baseModel{

	protected $request = null;
	protected $session = null;
	protected $baseDb = "core_users";

	public $sessionName = 'user';
	public $data = null;

	public function __construct(\pand\Database $db, \pand\Session $session, \pand\Request $request){
		parent::__construct($db);
		$this->session = $session;
		$this->request = $request;
		$this->data = new \stdClass();
	}

	public function init(){
		if (!$this->session->isset($this->sessionName)) {
			$this->session->set($this->sessionName, array());
		}

		$this->data = $this->session->get($this->sessionName);
	}

	private function checkActiveSession($session_id){
		// verificar si la sesion no se cerró por db
		return true;
	}

	public function isLogged(){
		if (empty($this->data)) {
			return false;
		}

		if (empty($this->data['active'])) {
			return false;
		}

		// ver si expiró la sesión o fue cerrada
		if(!$this->checkActiveSession($this->data['session_id'])){
			return false;
		}

		return true;
	}

	public function login($user, $password){
		$user = $this->escape($user);
		$password = md5($password);

		$data = array(
			"where" => "active = 1 AND (username = $user or email = $user) AND password = '$password'",
		);

		$user = $this->get($data);

		if (empty($user)) {
			return false;
		}
		$user = $user[0];

		// registrar la sesión del dispositivo
		$sessionData = array(
			"user_id" => $user['id'],
			"started_at" => date('Y-m-d H:i:s'),
			"client_ip" => $this->request->client_ip,
			"user_agent" => $this->request->user_agent,
			"status" => "open",
		);

		$session_id = $this->set($sessionData, null, 'core_sessions');

		$user['session_id'] = $session_id;

		$this->session->set($this->sessionName, $user);

		return true;
	}

	public function logout(){
		$this->session->unset($this->sessionName);

		if (!empty($this->data['session_id'])) {
			$sessionData = array(
				"id" => $this->data['session_id'],
				"status" => "closed",
				"closed_at" => date('Y-m-d H:i:s'),
			);

			$this->set($sessionData, "id", "core_sessions");
		}

		$this->data = null;
	}

} // class
