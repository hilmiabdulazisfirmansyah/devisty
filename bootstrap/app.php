<?php
session_start();

require __DIR__.'/../vendor/autoload.php';

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
		'db' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'database'	=> 'devisty',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		]
	],
]);

$container = $app->getContainer();

// Koneksi Database + membuat eloquent
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule){
	return $capsule;
};

$container['view'] = function ($container){
	$view = new \Slim\Views\Twig(__DIR__.'/../resources/views', [
		'cache' => false,
	]);

	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()

	));

	return $view;
};

$container['HomeController'] = function($container){
	return new \Devisty\Controllers\HomeController($container);
};

$container['AuthController'] = function($container){
	return new \Devisty\Controllers\Auth\AuthController($container);
};

require __DIR__.'/../app/routes.php';