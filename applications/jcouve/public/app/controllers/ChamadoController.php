<?php

namespace app\controllers;

use app\model\chamado\ChamadoModel;
class ChamadoController
{

  public function index($params)
  {
    return Controller::view("chamado/deferir_chamado");
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



  public static function listar()
  {

    $model = new ChamadoModel(); // Instância da Model
    $model->getAllRows(); // Obtendo todos os registros, abastecendo a propriedade $rows da model.

    Controller::view("admin/home");
  }

  public static function update()
  {
      $model = new ChamadoModel();

      Controller::view("admin/home");
      if (isset($_GET['id']))
          $model = $model->getById((int) $_GET['id']); 
  }
}
