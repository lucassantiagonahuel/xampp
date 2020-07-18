<?php
namespace pand\modules\test\controllers;

use pand\controllers\baseController as baseController;

if (!defined('FRAMEWORK')) { die; }

class indexController extends baseController{

    public function index(){
        echo 'Estoy en el modulo test';
    }

    public function prueba(){
        echo 'Estoy en el modulo test dentro de prueba';
    }

}
