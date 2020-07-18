<?php
namespace pand\modules\abm\controllers;

class abmController extends \pand\controllers\baseController{

    public $model = null;
    public $config = array();

    public function __construct($configFile = null, $module = null){
        parent::__construct();

        $this->model = new \pand\modules\abm\models\Abm($this->app->database);

        if (!empty($configFile)) {
            $this->loadConfig($configFile, $module);
        }
    }

    public function loadConfig($fileName, $module = null){
        $path = PATH_APPS.$this->app->currentApp;

        if ($module != null) {
            $path = PATH_MODULES.$module;
        }

        $path .= '/abmconfig/'.$fileName.'.json';

        $data = loadJson($path, false);
        $this->config = $data;
    }

    public function run($method){
        if (!method_exists($this, $method)) {
            return $this->notFound();
        }

        $this->$method();
    }

    public function index(){
        $this->view->loadFromModule('listado', 'abm');
        $this->view->show('listado', $this->config->vista);

        if (isset($this->config->formAlta) and $this->config->formAlta->tipo == 'fancy') {
            $this->view->loadFromModule('formAlta', 'abm');
            $this->view->show('formAlta', $this->config->formAlta);
        }

        $this->view->loadScriptFromModule('abmScript', 'abm', $this->config->gral);
        $this->view->show('showAbmScript', $this->config);

        // showvar($this->config);

        $this->render();
    }

    public function getList(){
        $sql = $this->model->buildAbmListQuery($this->config->modelo);

        $pagina = intval(@$_POST['pagina']);
		if (empty($pagina)) { $pagina = 1; }

        $rpp = $this->config->gral->rpp;

        $res = $this->model->getAbmList($pagina, $rpp, $sql);

        $this->renderAjax($res);
    }

    public function set(){
        $data = $this->request->params->post;

        if (empty($data)) {
            return $this->renderAjax('No se recibieron datos', false);
        }

        $editing = (!empty($data['id']));
        $insert = array();

        foreach ($this->config->modelo->campos as $key => $value) {
            if (isset($data[$value])) {
                $insert[$value] = $data[$value];
            }
        }

        // ver si están todos los campos requeridos
        if (!empty($this->config->modelo->required) and !$editing) {
            foreach ($this->config->modelo->required as $key => $value) {
                if (!isset($insert[$key])) {
                    return $this->renderAjax('El campo '.$value.' es obligatorio', false);
                }
            }
        }

        // ver si están los campos únicos no se repiten
        if (!empty($this->config->modelo->unique) and !$editing) {
            foreach ($this->config->modelo->unique as $key => $value) {
                $data = array(
                    "from" => $this->config->modelo->tabla,
                    "where" => $key.' = '.$insert[$key],
                );

                $res = $this->model->get($data, true);

                if (!empty($res)) {
                    return $this->renderAjax('El valor de '.$value.' es ya existe y debe ser único', false);
                }
            }
        }

        $res = $this->model->set($insert, 'id', $this->config->modelo->tabla);

        if (empty($res)) {
            return $this->renderAjax('Ocurrió un error al guardar los datos', false);
        }

        $this->renderAjax($res);
    }

    public function get(){
        $data = $this->request->params->post;

        if (empty($data)) {
            return $this->renderAjax('No se recibieron datos para obtener', false);
        }

        $where = array();

        foreach ($data as $key => $value) {
            if (!in_array($key, $this->config->modelo->campos)) {
                return $this->renderAjax('Uno de los campos solicitados no existe', false);
            }

            $where[] = $key." = ".$this->model->escape($value);
        }
        $where = implode(' AND ', $where);

        $data = array(
            "from" => $this->config->modelo->tabla,
            "where" => $where,
        );

        $res = $this->model->get($data, true);

        if (empty($res)) {
            return $this->renderAjax('No se encontraron resultados', false);
        }

        $this->renderAjax($res);
    }

}
