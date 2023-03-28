<?php

namespace app\DAO\usuario;
use app\model\usuario\CadastraChamadoModel;
use \PDO;

class CadastraChamadoDAO
{
    private $conexao;
    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=xjcouve";
        $descricaoname = 'root';
        $password = 'root';
        $this->conexao = new PDO($dsn, $descricaoname, $password);
    }

    public function insert(CadastraChamadoModel $model)
    {
        $sql = "INSERT INTO cadastro_chamados (id, titulo, descricao)
         VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        

        $options = [
            'cost' => 12,
        ];

        $stmt->bindValue(1, $model->id);
        $stmt->bindValue(2, $model->titulo);
        $stmt->bindValue(3, $model->descricao);
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
        include_once 'Model/UsuarioModel.php';

        $sql = "SELECT * FROM cadastro_chamados WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("UsuarioModel"); // Retornando um objeto específico UsuarioModel
    }
}
