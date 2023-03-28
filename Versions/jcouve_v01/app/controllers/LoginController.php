<?php
namespace app\controllers;

use app\controllers\Controller;

class LoginController
{
  public function index($params)
  {
    return Controller::view("login");
  }

  public function store($params)
  {
    var_dump($params);
    var_dump("Dados do Usuário");

    return Controller::view('usuario/home');
  }

  public function processaLogin($params)
  {
    // var_dump($params);
    // var_dump("Dados do Usuário");

    return Controller::view('ProcessaLogin');
  }
}