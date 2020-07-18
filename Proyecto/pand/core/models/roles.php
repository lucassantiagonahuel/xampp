<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

class Roles extends \pand\baseModel{

    protected $baseDb = "auth_paths";
    protected $tblPaths = "auth_paths";
    protected $tblRoles = "auth_roles";
    protected $tblAsign = "auth_asign";

    // esta es la ruta a acceder SIN los parámetros
    private $currentPath = '';
    private $user_level = 0;

    public $allowedPaths = array(
        'login',
        'login/login',
        'login/logout',
    );

	function __construct(\pand\Database $db, $allowedAppPaths = null, $userData = null){
        parent::__construct($db);

        if (!empty($userData)) {
            $this->user_level = $userData['level'];
            $this->user_id = $userData['id'];
        }

        $this->getAllowedPaths($allowedAppPaths);
    }

    private function getAllowedPaths($appAllowedPaths = null){
        if (!empty($appAllowedPaths)) {
            $this->allowedPaths = array_merge($this->allowedPaths, $appAllowedPaths);
        }

        $this->getPathsByUserId();
    }

    private function getPathsByUserId($user_id = null){
        $res = array();

        if (empty($user_id)) {
            if (empty($this->user_id)) {
                return $res;
            }
            
            $user_id = $this->user_id;
        }
        // obtener los roles para el usuario
        $rolesData = array(
            "select" => "id",
            "from" => $this->tblAsign,
            "where" => "active = 1 AND user_id = $user_id"
        );

        $roles = $this->get($rolesData);

        if (empty($roles)) { return false; }

        // obtener los roles hijos de forma recursiva
        foreach($roles AS $rol){
            $res[] = $rol['id'];
            $childRoles = $this->getChildRoles($rol['id']);
            $res = array_merge($res, $childRoles);
        }

        $res = array_unique($res);

        // setear todos los roles permitidos
        $this->getAllowedRoleNames($res);

        // obtener los paths de todos esos roles
        $this->getAllowedPathsByRoles($res);
    }

    private function getAllowedRoleNames($roles){
        if(empty($roles)){ return false; }

        $data = array(
            "select" => "name",
            "from" => $this->tblRoles,
            "where" => "id in (".implode(',', $roles).")"
        );

        $roleNames = array();
        $res = $this->get($data);
        if (!empty($res)) {
            foreach ($res as $key => $value) {
                $roleNames[] = $value['name'];
            }
        }

        $this->allowedRoles = $roleNames;
    }

    private function getAllowedPathsByRoles($roles){
        if(empty($roles)){ return false; }

    }

    private function getChildRoles($parent_id){
        $res = array();

        if (empty($parent_id)) { return $res; }

        $data = array(
            "select" => "id",
            "from" => $this->tblRoles,
            "where" => "active = 1 AND parent_id = $parent_id"
        );

        $childs = $this->get($data);

        if (!empty($childs)) {
            foreach ($childs as $child) {
                $res[] = $child['id'];
                $sub = $this->getChildRoles($child['id']);
                if (!empty($sub)) {
                    foreach ($sub as $key => $value) {
                        $res[] = $value;
                    }
                }
            }
        }

        return $res;
    }

    public function setCurrentRoute($path, $params){
        if (!empty($params)) {
            $params = array_reverse($params);
            foreach($params as $param){
                $path = rtrim($path, '/'.$param);
            }
        }

        $this->currentPath = $path;

        $this->registerRoute($path);
    }

    private function registerRoute($path){
        global $App;

        $appSec = $this->escape($App->currentApp);
        $pathSec = $this->escape($path);
        $dataCheck = array(
            "where" => "app = $appSec AND path = $pathSec"
        );
        $exists = $this->get($dataCheck);

        if (empty($exists)) {
            $dataInsert = array(
                "app" => $App->currentApp,
                "path" => $path,
            );

            $this->set($dataInsert);
        }
    }

    public function access(){
        return ($this->user_level >= 4 OR in_array($this->currentPath, $this->allowedPaths));
    }

    public function checkRole($name){
        return ($this->user_level >= 4 OR in_array($name, $this->roleNames));
    }

}
