<?php
namespace devModule;

use pand\controllers\baseController as baseController;

class testController extends baseController{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        echo 'Estoy en el módulo DEV en el controlador TEST papuuuuuu';
    } // index

} // class
?>
