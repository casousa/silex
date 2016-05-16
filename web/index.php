<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;]
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->before(function(Request $request){
	print("Antes das rotas");
});

$app->get('/hello/{name}', function ($name) use ($app) {
  return 'Hello '.$app->escape($name);
});

$app->after(function(Request $request, Response $response){
	print("Middleware After");
});

$app->run();