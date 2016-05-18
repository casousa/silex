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
		return $app['twig']->render('index.twig',array(
 			'name' => $name, 
		));
	}
}
