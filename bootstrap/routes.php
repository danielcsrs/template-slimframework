<?php
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->group('', function() use ($app) {

  $this->group('/login', function() {
    $this->get('/', 'AuthController:getLogin')->setname("auth.login");
    $this->post('/', 'AuthController:postLogin');
  });

})->add(new GuestMiddleware($container));

$app->group('', function() {
  
  $this->get('/', 'HomeController:index')->setname("home");
  $this->get('/login/logout', 'AuthController:getLogout')->setName('auth.logout');

})->add(new AuthMiddleware($container));
