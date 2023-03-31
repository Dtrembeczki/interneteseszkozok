<?php

define('ROOT', dirname(__DIR__) .DIRECTORY_SEPARATOR);
define('APP', ROOT . DIRECTORY_SEPARATOR . 'app');
define('MODEL', ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'model');
define('VIEW', ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'view');
define('CORE', ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'core');
define('CONTROLLER', ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'controller');
//public folder
define('PUBLICDIR', ROOT . DIRECTORY_SEPARATOR . 'public');

require_once APP . '/config.php';

$db = new Database;
$conn = $db->dbconnect();

require_once CORE . '/App.php';
require_once PUBLICDIR . '/elements/header.php';