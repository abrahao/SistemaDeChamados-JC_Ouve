<?php

namespace app\model\chamado;

use app\DAO\chamado\ChamadoDAO;

class ChamadoModel
{
    public $id, $titulo, $descricao, $status;

    public $rows;


    public function save()
    {
        $dao = new ChamadoDAO(); 
        if(empty($this->id))
        {
            $dao->insert($this);

        }
    }

    public function getAllRows()
    {
        include_once 'DAO/ChamadoDAO.php'; // Incluíndo o arquivo DAO
        
        $dao = new ChamadoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include_once 'DAO/ChamadoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new ChamadoDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new ChamadoModel(); // Operador Ternário
    }

}