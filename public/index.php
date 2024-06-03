<?php
session_start();


require_once __DIR__.'/../vendor/autoload.php';
require_once preg_replace("/public.*/", "config/config.php", __DIR__);
use Core\Router;


$routes = include __DIR__.'/../config/routes.php';

Router::run($routes);