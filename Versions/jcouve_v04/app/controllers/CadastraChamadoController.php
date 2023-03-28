<?php
namespace app\controllers;
use app\model\chamado\ChamadoModel;
// use app\model\usuario\CadastraChamadoModel;
class CadastraChamadoController
{
  public function index()
  {
    Controller::view("usuario/cadastra_usuario");
  }

  public function salvar($params)
  {
    $model = new ChamadoModel();
    $model->titulo = $_POST['titulo'];
    $model->descricao = $_POST['descricao'];
    $model->status = $_POST['status'];
    $model->save();

    header("Location: /usuario/home");

  }
}
