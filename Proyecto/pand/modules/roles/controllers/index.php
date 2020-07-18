<?php
namespace pand\modules\roles\controllers;

use pand\controllers\baseController as baseController;

if (!defined('FRAMEWORK')) { die; }

class indexController extends baseController{

    function __construct(){
        parent::__construct();
    }

    public function index($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('roles', 'roles');
        $Abm->config->formAlta->campos[1]->options = $Abm->model->getListSelect('id','name','auth_roles', ' - Sin rol superior - ');
        $Abm->run($action);
    }

    public function permisos($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('permisos');
        $Abm->config->formAlta->campos[1]->options = $Abm->model->getListSelect('id','nombre','global_paises');
        $Abm->run($action);
    }

}
