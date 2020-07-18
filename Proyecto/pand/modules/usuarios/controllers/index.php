<?php
namespace pand\modules\usuarios\controllers;

use pand\controllers\baseController as baseController;

if (!defined('FRAMEWORK')) { die; }

class indexController extends baseController{

    public $model = null;

    function __construct(){
        parent::__construct();

        if (isset($this->app->user)) {
            $this->model = $this->app->user;
        }
    }

    public function index($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('usuarios');
        $Abm->config->formAlta->campos[7]->options = getUsersLevels();

        // si no es admin, solo ve los inferiores
        if ($this->app->user->data['level'] != 4) {
            $Abm->config->modelo->where .= ' and level < '.$this->app->user->data['level'];
        }

        $Abm->run($action);
    }

    public function set(){
        die('Acà vengo');
    }

}
