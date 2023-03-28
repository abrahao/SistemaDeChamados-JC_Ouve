<?php
namespace app\controllers;
use app\model\usuario\CadastraChamadoModel;
class CadastraChamadoController
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

    $model = new CadastraChamadoModel();
    $model->titulo = $_POST['titulo'];
    $model->descricao = $_POST['descricao'];
    $model->save();

    header("Location: /usuario/home");

  }
}
