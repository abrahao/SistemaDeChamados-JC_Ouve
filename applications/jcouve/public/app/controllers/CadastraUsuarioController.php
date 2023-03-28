<?php
namespace app\controllers;
use app\model\usuario\UsuarioModel;
 
class CadastraUsuarioController
{
  public function index()
  {
    Controller::view("usuario/cadastra_usuario");
  }

  public function salvar($params)
  {
    $model = new UsuarioModel();
    $model->nome = $_POST['nome'];
    $model->email = $_POST['email'];
    $model->senha = $_POST['senha'];
    $model->save();

    header("Location: /");

  }
}
