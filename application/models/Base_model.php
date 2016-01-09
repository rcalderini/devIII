<?php

/**
 * Created by PhpStorm.
 * User: Roger William
 * Date: 07/12/2015
 * Time: 23:26
 */
class Base_model extends CI_Model
{
    /**
     * @var string
     */
    private $_table;

    /**
     * @var bool
     */
    private $_exclusaoLogica = false;

    /**
     * @param string $table Nome da tabela
     * @param bool $exclusaoLogica flag de exclusão lógica
     */
    public function __construct($table = '', $exclusaoLogica = false)
    {
        parent::__construct();
        $this->_table = $table;
        $this->_exclusaoLogica = $exclusaoLogica;

        //var_dump($this);
        //die;
    }

    /**
     * Retorna lista de itens de uma tabela
     *
     * @param int $limit limit rows table
     * @return array Object
     */
    public function listAll($limit = null)
    {
        return $this->find(array(), $limit)->result();
    }

    /**
     * Retorna numero de registros ativos na tabela
     *
     * @return int
     */
    public function getRows()
    {
        return $this->find()->count_all_results();
    }

    /**
     * Select from tabela com where, retorna apenas 1 elemento
     *
     * @param array $where array(campo => valor)
     * @return Object
     */
    public function findOne(array $where = array())
    {
        return $this->find($where)->row();
    }

    /**
     * Select * from table com filtro por campos e limit
     *
     * @param array $where array(campo => valor)
     * @param int $limit limit rows
     * @return array Object
     */
    public function findAll(array $where = array(), $limit = null)
    {
        return $this->find($where, $limit)->result();
    }

    /**
     * Insert into from table
     *
     * class Myclass {
     *   public $title = 'My Title';
     *   public $content = 'My Content';
     *   public $date = 'My Date';
     *  }
     * Produces: INSERT INTO mytable (title, content, date) VALUES ('My Title', 'My Content', 'My Date')
     *
     *
     * @param $object
     * @return int Last Id
     */
    public function insertItem($object)
    {
        return $this->insert($object);
    }

    /**
     * Valida dados e verifica exclusão lógica antes de remover
     *
     * @param $object
     * @return int
     */
    private function insert($object)
    {
        if ($this->_exclusaoLogica) {
            $object->ativo = 'S';
            $object->data_alteracao = date('Y-m-d H:i:s');
        }

        $this->db->set($object);
        $this->db->insert($this->_table);

        return $this->db->insert_id();
    }

    /**
     * Remove um determinado elemento baseado no id passado
     *
     * @param array $id array('id' => $id)
     * @return bool TRUE or FALSE
     */
    public function removeItem(array $id)
    {
        return $this->delete($id);
    }

    /**
     * Baseado na exclusão logica ele desativa um elemento
     * caso contrario remove o mesmo da tabela.
     *
     * @param array $id array('id' => $id)
     * @return bool Sucesso ao remover
     */
    private function delete(array $id)
    {
        if ($this->_exclusaoLogica) {
            $object = (object)array('ativo' => 'S');
            return $this->update($object, $id);
        }

        return $this->db->delete($this->_table, $id);
    }

    /**
     *  Atualiza um registro da tabela
     *
     * class Myclass {
     *   public $title = 'My Title';
     *   public $content = 'My Content';
     *   public $date = 'My Date';
     *  }
     *
     * Produces:
     * UPDATE `mytable`
     * SET `title` = '{$title}', `name` = '{$name}', `date` = '{$date}'
     * WHERE id = `$id`
     *
     * @param $object
     * @param array $id
     * @return bool Sucesso ao atualizar
     *
     *
     */
    public function update($object, array $id)
    {
        if ($this->_exclusaoLogica) {
            $object->data_alteracao = date('Y-m-d H:i:s');
        }

        $this->db->where($id);
        return $this->db->update($this->_table, $object);
    }

    /**\
     * Find basico para consultas
     *
     * @param array $where array(campo => valor)
     * @param int $limit limit rows
     * @return db
     */
    private function find(array $where = array(), $limit = null)
    {
        if ($this->_exclusaoLogica) {
            $where['ativo'] = 'S';
        }

        return $this->db->get_where($this->_table, $where, $limit);
    }

}