<?php
namespace app\controllers;
use app\model\UsuarioModel;
class CadastraUsuarioController
{
  public function index()
  {
    Controller::view("usuario/cadastra_usuario");
  }

  public function salvar($params)
  {
    // var_dump($params);
    // var_dump("Dados do Usuário");
    // include '../model/PsicologoModel.php';

    $model = new UsuarioModel();
    $model->nome = $_POST['nome'];
    $model->email = $_POST['email'];
    $model->senha = $_POST['senha'];
    $model->save();

    header("Location: /");

  }
}
