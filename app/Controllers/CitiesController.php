<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CitiesModel;

class CitiesController extends BaseController
{
    public function getHome($request, $response, $args) 
    {
      $cities = CitiesModel::orderBy('name', 'ASC')->get();

      $params = array(
        'cities' => $cities
      );

      return $this->view->render($response, 'cities/home.twig', $params);
    }

    public function getCity($request, $response, $args) 
    {
      $cityId = $args['id'];
      $city =  CitiesModel::where('id', $cityId)->first();

      $params = [
        'city' => $city,
      ];
  
      return $this->view->render($response, 'cities/register.twig', $params);
    }

    public function saveCity($request, $response, $args) 
    {
      $data = $request->getParsedBody();

      $city = [
        'name' => $data['name'],
        'state' => $data['state']
      ];

      $id = CitiesModel::insertGetId($academy);

      // $id = $academy['id'];
      $this->flash->addMessage('infoHidding', 'Cidade adicionado com sucesso.');

      return $this->view->render($response, 'cities/home.twig');
    }

}
