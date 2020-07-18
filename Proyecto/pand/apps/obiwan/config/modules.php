<?php
if (!defined('FRAMEWORK')) { die; }

global $App;

$appModules = array();

$appModules[] = (object)array(
                    "path" => "login",
                    "module" => "auth",
                );

$appModules[] = (object)array(
                    "path" => "users",
                    "module" => "usuarios",
                );

$appModules[] = (object)array(
                    "path" => "regional",
                    "module" => "regional",
                );

$App->modules = array_merge($App->modules, $appModules);
