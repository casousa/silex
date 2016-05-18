<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Silex\Application();

//Utilizado para exibir os erros na tela
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(),array(
	'twig.path' => __DIR__.'/../views'
));

$app['twig'] = $app->share($app->extend('twig', function($twig, $app){
	return $twig;
}));