<?php

namespace app\DAO\chamado;
use app\model\chamado\ChamadoModel;
use \PDO;

class ChamadoDAO
{
    private $conexao;
    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=xjcouve";
        $descricaoname = 'root';
        $password = 'root';
        $this->conexao = new PDO($dsn, $descricaoname, $password);
    }

    public function insert(ChamadoModel $model)
    {
        $sql = "INSERT INTO cadastro_chamados (id, titulo, descricao, status)
         VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);
        $stmt->bindValue(2, $model->titulo);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->status);
        $stmt->execute();

    }
    public function select()
    {
        $sql = "SELECT * FROM cadastro_chamados";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once 'Model/chamadoModel.php';

        $sql = "SELECT * FROM cadastro_chamados WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("chamadoModel"); // Retornando um objeto específico chamadoModel
    }
}
