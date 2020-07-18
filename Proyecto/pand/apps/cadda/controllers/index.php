<?php
namespace caddaApp;

use pand\controllers\baseController as baseController;

class indexController extends baseController{

    public function __construct(){
        parent::__construct();

        global $App;
        if (isset($App->user)) {
            if (@$App->user->data['level'] > 1) {
                header('Location: '.$App->base_path.'admin');
                die;
            }
        }
    }

    public function index(){
        echo 'Estoy en el index de deportistas';
        $this->render();
    }

    public function registro(){
        echo 'Estoy en el registro de deportistas';
    }

}
