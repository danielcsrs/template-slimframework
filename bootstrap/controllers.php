<?php

$container['auth'] = function($container) {
  return new \App\Auth\Auth;
};

$container['flash'] = function($container){
  return new \Slim\Flash\Messages;
};

$container['validator'] = function($container) {
  return new \App\Validation\Validator;
};

$container['csrf'] = function($container) {
  return new Slim\Csrf\Guard;
};

$container['AuthController'] = function($container){
  return new \App\Controllers\AuthController($container);
};

$container['HomeController'] = function($container){
  return new \App\Controllers\HomeController($container);
};

