<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Respect\Validation\Validator as v;
use App\Models\UsersModel;

class AuthController extends BaseController
{

  public function getLogout($request, $response, $args) 
  {
    $this->auth->logout();

    return $response->withRedirect($this->router->pathFor('home'));
  }

  public function getLogin($request, $response, $args) 
  {
    return $this->view->render($response, 'auth/login.twig');
  }

  public function postLogin($request, $response, $args) 
  {
    $authentication = (object)$this->auth->attempt(
      $request->getParam('username'),
      $request->getParam('password')
    );

    if(!$authentication->success) {
      $this->flash->addMessage('error', 'O seu usuário ou senha está incorreto. Por favor, verifique os dados informados e tente novamente.');
      return $response->withRedirect($this->router->pathFor('auth.login'));
    }

    return $response->withRedirect($this->router->pathFor('home'));
  }
}
