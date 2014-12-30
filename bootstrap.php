<?php
require_once 'vendor/autoload.php';

/* Database config */
$dbhost = 'localhost';
$dbname = 'api_e_silex';
define('DBUSER', 'root');
define('DBPASS', '');
define('DSN', "mysql:host={$dbhost};dbname={$dbname}");

$app = new \Silex\Application();
$app['debug'] = true;