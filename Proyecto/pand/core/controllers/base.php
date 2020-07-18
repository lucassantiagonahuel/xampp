<?php
namespace pand\controllers;

class baseController{

    public function __construct(){
        ob_implicit_flush(0);
        ob_start();

        global $App;
        $this->app = $App;
        $this->view = $App->view;
        $this->request = $App->request;
    }

    public function renderAjax($data, $success = true, $status = '200'){
        $key = ($success)?'data':'error';

        $response = array(
            "status" => $status,
            "success" => $success,
            $key => $data
        );

        echo json_encode($response);
    }

    // obtiene el contenido del controlador, y agrega el head y footer
    public function render($onlyContent = false, $exclude_header = false){

        $content = trim(ob_get_contents());

        ob_end_clean();

        if (!$onlyContent) {
            $this->showHead();
            if (!$exclude_header) {
                $this->showHeader();
            }
        }

        echo $content;

        if (!$onlyContent) {
            if (!$exclude_header) {
                $this->showFooter();
            }

            $this->showFoot();
        }
    }

    private function showHead(){
        $this->view->load('template');
        $this->view->show('head');
    }

    private function showFoot(){
        $this->view->load('template');
        $this->view->show('foot');
    }

    private function showHeader(){
        global $App;
        $this->view->load('template');

        if (is_callable('loadMenuItems')) {
            loadMenuItems();
        }

        $this->view->show('header', array(@$App->menuItems));
    }

    private function showFooter(){
        $this->view->load('template');
        $this->view->show('footer');
    }

    public function notFound(){
        $this->view->load('template');
        $this->view->show('notFound');
        $this->render();
    }

    public function unauthorized(){
        $this->view->load('template');
        $this->view->show('unauthorized');
        $this->render();
    }

}
