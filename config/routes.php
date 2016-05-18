<?php

require_once __DIR__.'/bootstrap.php';

$app->get('/', 'Users\Controller\IndexController::indexAction');
$app->get('name/{name}', 'Users\Controller\IndexController::indexAction');
