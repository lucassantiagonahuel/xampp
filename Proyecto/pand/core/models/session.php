<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

class Session{

	function __construct(){
        @session_start();
	}

    public function isset($name){
        return (isset($_SESSION[$name]));
    }

    public function empty($name){
        return (empty($_SESSION[$name]));
    }

    public function get($name){
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }else{
            return null;
        }
    }

    public function set($key, $value){
        $_SESSION[$key] = $value;
    }

	public function unset($key){
		$_SESSION[$key] = null;
		unset($_SESSION[$key]);
		return true;
	}

}
