<?php

namespace App\Middleware;

class AuthMiddleware extends Middleware
{
  public function __invoke($request, $response, $next)
  {
    if(!$this->container->auth->check())
    {
      //$this->container->flash->addMessage('error', 'Para acessar, primeiro realize login no sistema.');
      return $response->withRedirect($this->container->router->pathFor('auth.login'));
    }

    $response = $next($request, $response);
    return $response;
  }
}
