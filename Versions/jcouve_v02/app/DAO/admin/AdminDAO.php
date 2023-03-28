<?php

namespace app\DAO\admin;
use app\model\admin\AdminModel;
use \PDO;

class AdminDAO
{
    private $conexao;
    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=xjcouve";
        $emailname = 'root';
        $password = 'root';
        $this->conexao = new PDO($dsn, $emailname, $password);
    }

    public function insert(AdminModel $model)
    {
        $sql = "INSERT INTO cadastro_admin (id, nome, email, senha)
         VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        

        $options = [
            'cost' => 12,
        ];

        $stmt->bindValue(1, $model->id);
        $stmt->bindValue(2, $model->nome);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, password_hash($model->senha, PASSWORD_BCRYPT, $options));
        $stmt->execute();

    }
    public function select()
    {
        $sql = "SELECT * FROM cadastro_admin";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        include_once 'Model/AdminModel.php';

        $sql = "SELECT * FROM cadastro_admin WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("AdminModel"); // Retornando um objeto específico AdminModel
    }
}
