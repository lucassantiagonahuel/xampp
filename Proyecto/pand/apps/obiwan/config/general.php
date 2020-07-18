<?php
if (!defined('FRAMEWORK')) { die; }

global $App;

$App->config->requireLogin = true;

$App->config->logo = '/obiwan/images/obiwan-login.jpg';
$App->config->loginImage = '/obiwan/images/obiwan-login.jpg';
