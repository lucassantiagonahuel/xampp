<?php
namespace devModule;

use pand\controllers\baseController as baseController;

class indexController extends baseController{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        echo 'Estoy en el módulo DEV papuuuuuu';
    } // index

} // class
?>
