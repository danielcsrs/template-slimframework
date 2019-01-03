<?php

use Respect\Validation\Validator as v;

session_start();

require __DIR__ . "/../vendor/autoload.php";

// Slimframework initilize.
$settings = require __DIR__ . '/../bootstrap/settings.php';
$app = new \Slim\App($settings);
$container = $app->getContainer();

// Load view engine.
$container['view'] = function($container) {
  $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
    'cache' => false,
  ]);

  $view->addExtension(new \Slim\Views\TwigExtension(
    $container->router,
    $container->request->getUri()
  ));

  $view->getEnvironment()->addGlobal('auth', [
    'check' => $container->auth->check(),
    'user' => $container->auth->user(),
  ]);

  $view->getEnvironment()->addGlobal('flash', $container->flash);
  
  return $view;
};

// Load error Handler
$container['notFoundHandler'] = function($container)
{
  return function($request, $response) use ($container)
  {
    return $container['view']->render($response->withStatus(404), '_app/errors/404.twig');
  };
};

// Load controllers.
require __DIR__ . '/../bootstrap/controllers.php';

// Load middlewares
$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\CsrfViewMiddleware($container));
$app->add($container->csrf);

// Load custom validations
v::with('App\\Validation\\Rules\\');

// Load routes app.
require __DIR__ . '/../bootstrap/routes.php';
