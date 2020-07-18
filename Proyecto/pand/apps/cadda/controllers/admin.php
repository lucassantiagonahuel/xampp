<?php
namespace caddaApp;

use pand\controllers\baseController as baseController;

class adminController extends baseController{

    public function __construct(){
        parent::__construct();

        if (strpos($this->app->request->host, '/admin/') === false) {
            $this->app->request->host .= 'admin/';
        }
    }

    public function index(){
        $this->view->load('index');
        $this->view->show('resumen');
        $this->render();
    }

    public function equipos($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('equipos');
        $Abm->config->formAlta->campos[1]->options = $Abm->model->getListSelect('id','nombre','cadda_federaciones');
        $Abm->run($action);
    }

    public function jugadores(){
        $this->view->load('index');
        $this->view->show('listado', 'jugadores');
        $this->render();
    }

    public function federaciones($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('federaciones');
        $Abm->config->formAlta->campos[5]->options = $Abm->model->getListSelect('id','nombre','global_provincias');
        $Abm->config->formAlta->campos[6]->options = $Abm->model->getListSelect('id','nombre','global_ciudades');
        $Abm->run($action);
    }

    public function inscripciones(){
        $this->view->load('index');
        $this->view->show('listado', 'inscripciones');
        $this->render();
    }


}
