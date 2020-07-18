<?php
if (!defined('FRAMEWORK')) { die; }

global $App;

$App->config->database = (object)array(
    "type" => "mysqli",
    "host" => "localhost",
    "user" => "root",
    "password" => "passdb1234",
    "database" => "obiwan",
);

// config para el acceso remoto a los datos de los estudios
$App->config->DCMdatabase = (object)array(
    "type" => "mysqli",
    "host" => "localhost",
    "user" => "root",
    "password" => "passdb1234",
    "database" => "obiwan",
);
