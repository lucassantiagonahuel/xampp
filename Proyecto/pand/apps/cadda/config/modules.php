<?php
if (!defined('FRAMEWORK')) { die; }

global $App;

$appModules = array();

$appModules[] = (object)array(
                    "path" => "regional",
                    "module" => "regional",
                );

$appModules[] = (object)array(
                    "path" => "login",
                    "module" => "auth",
                );

$appModules[] = (object)array(
                    "path" => "usuarios",
                    "module" => "usuarios",
                );

$appModules[] = (object)array(
                    "path" => "roles",
                    "module" => "roles",
                );

$App->modules = array_merge($App->modules, $appModules);
