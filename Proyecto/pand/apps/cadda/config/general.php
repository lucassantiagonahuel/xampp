<?php
if (!defined('FRAMEWORK')) { die; }

global $App;

$App->config->requireLogin = true;

$App->config->logo = '/cadda/images/logo.png';
$App->config->loginImage = '/cadda/images/login-background.jpg';
