<?php
namespace pand\modules\test\controllers;

use pand\controllers\baseController as baseController;

if (!defined('FRAMEWORK')) { die; }

class ejemploController extends baseController{

    public function index(){
        echo 'Estoy en el modulo test dentro de ejemplo';
    }

    public function prueba(){
        echo 'Estoy en el modulo test dentro de ejemplo metodo prueba';
    }

}
