<?php
namespace app\controllers;

use app\controllers\Controller;

class HomeAdminController
{
  public function index($params)
  {
    return Controller::view("admin/home");
  }
}
