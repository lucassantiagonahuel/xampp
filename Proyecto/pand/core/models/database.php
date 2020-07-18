<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

class Database{

	public $db = null;

	public $type = 'mysqli';
	public $host = null;
	public $user = null;
	public $password = null;
	public $database = null;

	function __construct($config, $debug){
        $this->type = $config->type;
        $this->host = $config->host;
        $this->user = $config->user;
        $this->password = $config->password;
        $this->database = $config->database;

        $this->db = newAdoConnection($this->type);

        // $this->db->debug = $debug;
        $this->db->debug = false;

		$this->db->setFetchMode(ADODB_FETCH_ASSOC);

        try{
            $this->db->connect($this->host, $this->user, $this->password, $this->database);
        }catch(\Exception $e){
            showvar($e->getMessage);
        }

        if (!$this->db->isConnected()) {
            throw new \Exception("Error connecting to database: ".$this->db->_errorMsg, 1);
        }

        $this->db->setCharset('utf8');
	}

}
