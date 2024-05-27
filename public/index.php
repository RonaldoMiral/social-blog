<?php
// require_once preg_replace("/public.*/", "config/config.php", __DIR__);

// echo "I am at the top of the hierarquy. Respect me <br>";
// $requested_url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
// echo "<h1>Ronaldo Miral Paulo</h1>";

// $url = (!empty($requested_url) ? $requested_url : 'home');

// include "./../src/views/home.php";
// header("Location: ./../src/views/home.php");


// require_once __DIR__.'/../core/Core.php';
// require_once __DIR__.'/../routes/router.php';

// $core = new Core();
// $core->run($routes);

require_once __DIR__.'/../vendor/autoload.php';
use Core\App;

$routes = include __DIR__.'/../config/routes.php';

$app = new App();
$app->run($routes);