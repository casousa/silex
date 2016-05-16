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


/*
 * COMANDOS COMENTADOS APENAS PARA POSTERIOR CONSULTA
 */

//Utilizado para alterar valor de retorno da função da rota
//->convert('name', function($name){ // Converte o tipo do valor retornado
	//return 	(int) $name; 
//});

//Executado antes da rota
//$app->before(function(Request $request){
	//print("Antes das rotas.");
//});

//Executado depois da rota
//$app->after(function(Request $request, Response $response){
	//print(" <br> Middleware After. <br>");
//});

//Excutado após o response ser enviado para o browser
//$app->finish(function(Request $request, Response $response){
	//print(" <br>Vai ser executado depois que o response for enviado para o browser.");
//});