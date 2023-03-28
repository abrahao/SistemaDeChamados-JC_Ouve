<?php
namespace app\controllers;

use app\controllers\Controller;

class LoginUsuarioController
{
  public function index($params)
  {
    return Controller::view("usuario/login");
  }


  public function processaLogin($params)
  {
    return Controller::view('usuario/ProcessaLogin');
  }
} 