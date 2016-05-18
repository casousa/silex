<?php

namespace Users\Controller;

use Silex\Application;

class IndexController
{
	/**
	* Responsável por reenderizar a view index
	* 
	* @param  Application $app Silex\Application
	* @return Twig_Environment
	*/
	public function indexAction(Application $app)
	{
		/*
		 * Retorna o valor passado da variavel $name enviado pela rota através
		 * do método GET.
		 */
		$name = $app['request_stack']->getCurrentRequest()->get('name');

		return $app['twig']->render('index.twig',array(
 			'name' => $name, 
		));
	}
}
