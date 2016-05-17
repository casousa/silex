<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

//Utilizado para exibir os erros na tela
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(),array(
	'twig.path' => __DIR__.'/../views'
));

//Criação das rotas
$app->get('/', function () use ($app) {
 	return 'Hello World';
});

$app->mount('/users', require __DIR__.'/../src/Users/Controller/IndexController.php');

$app->run();