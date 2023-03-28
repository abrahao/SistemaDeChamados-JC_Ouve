<?php
namespace app\controllers;

use app\controllers\Controller;

class HomeUsuarioController
{
  public function index($params)
  {
    return Controller::view("usuario/home");
  }
}
