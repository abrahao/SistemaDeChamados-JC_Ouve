<?php
namespace app\controllers;
use app\model\admin\AdminModel;
class CadastraAdminController
{
  public function index()
  {
    Controller::view("admin/cadastra_admin");
  }

  public function salvar($params)
  {
    // var_dump($params);
    // var_dump("Dados do Usuário");
    // include '../model/PsicologoModel.php';

    $model = new AdminModel();
    $model->nome = $_POST['nome'];
    $model->email = $_POST['email'];
    $model->senha = $_POST['senha'];
    $model->save();

    header("Location: /");

  }
}
