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
        }else {
            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        }   
    }

    public function getAllRows()
    {
        include_once 'DAO/ChamadoDAO.php'; // Incluíndo o arquivo DAO
        
        $dao = new ChamadoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id_cad_psic)
    {
        $dao = new ChamadoDAO();

        $obj = $dao->selectById($id_cad_psic); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new ChamadoDAO(); // Operador Ternário
    }
} 