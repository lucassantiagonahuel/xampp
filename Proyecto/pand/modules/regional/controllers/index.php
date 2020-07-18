<?php
namespace pand\modules\regional\controllers;

use pand\controllers\baseController as baseController;

if (!defined('FRAMEWORK')) { die; }

class indexController extends baseController{

    public $model = null;

    function __construct(){
        parent::__construct();

        showvar($this->request);
    }

    public function index(){
        $this->view->loadFromModule('index', 'regional');
        $this->view->show('mostrarOpcionesRegionales');
        $this->render();
    }

    public function paises($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('paises');
        $Abm->run($action);
    }

    public function provincias($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('provincias');
        $Abm->config->formAlta->campos[1]->options = $Abm->model->getListSelect('id','nombre','global_paises');
        $Abm->run($action);
    }

    public function ciudades($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('ciudades');
        $Abm->config->formAlta->campos[2]->options = $Abm->model->getListSelect('id','nombre','global_paises');
        $Abm->config->formAlta->campos[3]->options = $Abm->model->getListSelect('id','nombre','global_provincias');
        $Abm->run($action);
    }

}
