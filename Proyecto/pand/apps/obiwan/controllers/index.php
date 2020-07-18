<?php
namespace obiwanApp;

use pand\controllers\baseController as baseController;

class indexController extends baseController{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        echo 'Estoy en el index de deportistas';
        $this->render();
    }

    public function estudios($action = 'index'){
        $Abm = new \pand\modules\abm\controllers\abmController('estudios');
        $Abm->run($action);
    }

    public function getListaEstudios(){
        $dbRemote = new pand\Database($this->app->config->DCMdatabase, $this->app->debug);
        $this->model = new \pand\modules\abm\models\Abm($this->app->database);
        $sql = $this->model->buildAbmListQuery($this->config->modelo);

        $pagina = intval(@$_POST['pagina']);
		if (empty($pagina)) { $pagina = 1; }

        $rpp = $this->config->gral->rpp;

        $res = $this->model->getAbmList($pagina, $rpp, $sql);

        $this->renderAjax($res);
    }

}
