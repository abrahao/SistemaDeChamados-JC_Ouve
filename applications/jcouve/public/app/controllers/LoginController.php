<?php
// Teste //

namespace app\controllers;

use app\controllers\Controller;

class LoginController
{
  public function index($params)
  {
    return Controller::view("/login");
  }


  public function processaLogin($params)
  {
    var_dump($params);
    var_dump("store do contact");
    return Controller::view('/ProcessaLogin');
  }
} 