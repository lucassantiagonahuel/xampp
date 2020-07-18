<?php

define('FRAMEWORK', 'PAND');

// bloqueo de ips

// log de peticiones

require('../core/bootstrap.php');

$App = new pand\Core();

$App->loadSession(new pand\Session());

$App->loadRequest(new pand\Request());

$App->loadView(new pand\View());

$App->loadConfig();

$App->loadApplications();

$App->setCurrentApplication();

$App->setDebugLevel();

$App->loadAppConfig();

if (!empty($App->config->database)) {
    $mode = $App->mode;
    $App->setDatabase(new pand\Database($App->config->database->$mode, $App->debug));
}
if(@$App->config->requireLogin){
    $App->loadUserModel(new pand\modules\auth\models\User($App->database, $App->session, $App->request));
    $App->user->init();
    $App->loadRoles(new pand\Roles($App->database, @$App->config->allowedPaths, @$App->user->data));
}

$controllerData = $App->getController();

if(@$App->config->requireLogin){
    $App->roles->setCurrentRoute($App->request->path, $controllerData->params);

    if (!$App->roles->access()) {
        if ($App->user->isLogged()) {
            $controllerData = $App->getControllerDataUnauthorized();
        }else{
            $controllerData = $App->getControllerDataLogin();
        }
    }
}

$App->runController($controllerData);

?>
