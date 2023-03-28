<?php

namespace app\model\admin;

use app\DAO\admin\AdminDAO;

/**
 * A camada model é responsável por transportar os dados da Controller até a DAO e vice-versa.
 * Também é atribuído a Model a validação dos dados da View e controle de acesso aos métodos
 * da DAO.
 */
class AdminModel
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $nome, $email, $senha;


    /**
     * Propriedade que armazenará o array retornado da DAO com a listagem das pessoas.
     */
    public $rows;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new AdminDAO(); 

        // Verificando se a propriedade id foi preenchida no model
        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
            // já preenchido
            $dao->insert($this);

        }
    }
}