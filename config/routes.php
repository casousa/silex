<?php

require_once __DIR__.'/bootstrap.php';

$app->get('/', 'Users\Controller\IndexController::indexAction');
