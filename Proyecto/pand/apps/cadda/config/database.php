<?php
if (!defined('FRAMEWORK')) { die; }

global $App;

$App->config->database = (object)array(
    "dev" => (object)array(
        "type" => "mysqli",
        "host" => "localhost",
        "user" => "root",
        "password" => "passdb1234",
        "database" => "cadda",
    ),
    "prod" => (object)array(
        "type" => "mysqli",
        "host" => "190.228.29.195",
        "user" => "cadda_test",
        "password" => "Cadda2020",
        "database" => "cadda_test",
    ),
);
