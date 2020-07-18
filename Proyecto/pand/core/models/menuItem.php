<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

class MenuItem{

    public $link = '';
    public $name = '';
    public $class = '';

    function __construct($name, $link, $class = ''){
        $this->name = $name;
        $this->link = $link;
        $this->class = $class;
    }

}
