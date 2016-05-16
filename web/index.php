<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

//Utilizado para exibir os erros na tela
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(),array(
	'twig.path' => __DIR__.'/views'
));

//Executado antes da rota
$app->before(function(Request $request){
	print("Antes das rotas.");
});

//Criação das rotas
$app->get('/', function () use ($app) {
 	return 'Hello World';
});

$app->get('/users/{name}', function ($name) use ($app) {
	if(is_null($name)){
		return $app->redirect('/');
	}

 	return 'Olá usuario: '.$name;
})
->value('name',NULL) //Caso não seja passado o nome, o valor default será NULL
->convert('name', function($name){ // Converte o tipo do valor retornado
	return 	(int) $name; 
});


//Executado depois da rota
$app->after(function(Request $request, Response $response){
	print(" <br> Middleware After. <br>");
});

//Excutado após o response ser enviado para o browser
$app->finish(function(Request $request, Response $response){
	print(" <br>Vai ser executado depois que o response for enviado para o browser.");
});

$app->run();