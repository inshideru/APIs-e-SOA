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

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());