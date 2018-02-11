<?php

$basePath = realpath(dirname(__FILE__)) . '/';
define('BASE_PATH', $basePath);
define('CORS', BASE_PATH.'cors/');

require CORS.'Router.php';
require CORS.'Controller.php';
require CORS.'View.php';
include("adodb5/adodb.inc.php");
require CORS.'DB.php';
require CORS.'Model.php';

$route = new Router();