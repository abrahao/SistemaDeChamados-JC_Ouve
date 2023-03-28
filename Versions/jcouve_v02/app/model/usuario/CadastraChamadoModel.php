<?php

namespace app\model\usuario;

use app\DAO\usuario\CadastraChamadoDAO;

/**
 * A camada model é responsável por transportar os dados da Controller até a DAO e vice-versa.
 * Também é atribuído a Model a validação dos dados da View e controle de acesso aos métodos
 * da DAO.
 */
class CadastraChamadoModel
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     * para saber mais sobre Propriedades de Classe, leia: https://www.php.net/manual/pt_BR/language.oop5.properties.php
     */
    public $id, $titulo, $descricao;


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
        // include_once 'DAO/CadastraChamadoDAO.php'; // Incluíndo o arquivo DAO

        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new CadastraChamadoDAO(); 

        // Verificando se a propriedade id foi preenchida no model
        // Para saber mais sobre a palavra-chave this, leia: https://pt.stackoverflow.com/questions/575/quando-usar-self-vs-this-em-php
        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
            // já preenchido
            $dao->insert($this);

        }
    }


    /**
     * Método que encapsula a chamada a DAO e que abastecerá a propriedade rows;
     * Esse método é importante pois como a model é "vista" na View a propriedade
     * $rows será acessada e possibilitará listar os registros vindos do banco de dados
     */
    public function getAllRows()
    {
        include_once 'DAO/CadastraChamadoDAO.php'; // Incluíndo o arquivo DAO
        
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new CadastraChamadoDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }


    /**
     * Método que encapsula o acesso ao método selectById da camada DAO
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * a ser recuperado do MySQL, via camada DAO.
     */
    public function getById(int $id)
    {
        include_once 'DAO/CadastraChamadoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new CadastraChamadoDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        // Para saber mais operador ternário, leia: https://pt.stackoverflow.com/questions/56812/uso-de-e-em-php
        return ($obj) ? $obj : new CadastraChamadoModel(); // Operador Ternário

        /*if($obj)
        {
            return  $obj;
        } else {
            return new CadastraChamadoModel();
        }*/
    }

}