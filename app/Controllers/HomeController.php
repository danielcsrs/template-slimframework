<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index($request, $response, $args) 
    {
        return $this->view->render($response, 'home/index.twig');
    }

}
