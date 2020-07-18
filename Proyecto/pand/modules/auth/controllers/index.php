<?php
namespace pand\modules\auth\controllers;

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

    public function index(){
        $this->view->loadStyleFromModule('login', 'auth');
        $this->view->loadFromModule('loginForm', 'auth');
        $this->view->loadScriptFromModule('login', 'auth');
        $this->render(false, true);
    }

    public function login(){
        $datos = $this->request->params->post;
        if (empty($datos)) {
            return $this->renderAjax('Debe indicar los datos de acceso', false);
        }

        if (empty($datos['email'])) {
            return $this->renderAjax('Debe indicar el email', false);
        }

        if (empty($datos['password'])) {
            // return $this->renderAjax('Debe indicar la contraseña', false);
        }

        $logged = $this->model->login($datos['email'], $datos['password']);

        if(!$logged){
            return $this->renderAjax('Los datos ingresados son incorrectos', false);
        }

        $this->renderAjax(@$this->model->data['level']);
    }

    public function logout(){
        $this->model->logout();
        header("Location: ".$this->app->request->host);
    }

}
