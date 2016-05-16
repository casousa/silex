<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

//Utilizado para exibir os erros na tela
$app['debug'] = true;

//Executado antes da rota
$app->before(function(Request $request){
	print("Antes das rotas");
});

//Criação da rota
$app->get('/hello/{name}', function ($name) use ($app) {
  return 'Hello '.$app->escape($name);
});

//Executado depois da rota
$app->after(function(Request $request, Response $response){
	print("Middleware After");
});

//Excutado após o response ser enviado para o browser
$app->finish(function(Request $request, Response $response){
	print("Vai ser executado depois que o response for enviado para o browser.");
});

$app->run();