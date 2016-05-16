<?php

$users = $app['controllers_factory'];

$users->get('/{name}', function ($name) use ($app) {
	if(is_null($name)){
		return $app->redirect('/');
	}

 	return $app['twig']->render('index.twig',array(
 		'name' => $name, 
	));
})
->value('name',NULL); //Caso não seja passado o nome, o valor default será NULL

return $users;