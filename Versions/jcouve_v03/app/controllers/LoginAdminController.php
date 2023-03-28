<?php
namespace app\controllers;

use app\controllers\Controller;

class LoginAdminController
{
  public function index($params)
  {
    return Controller::view("admin/login");
  }

  public function processaLogin($params)
  {
    return Controller::view('admin/ProcessaLogin');
  }
} 