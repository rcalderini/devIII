<?php
/**
 * Created by PhpStorm.
 * User: Roger William
 * Date: 05/10/2015
 * Time: 16:40
 */

class menu_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('menu');
        $this->setExclusaoLogica(false);
    }

    public function findAll(array $where = array(), $limit = null) {
        $this->db->select('m.id_menu');
        $this->db->select('m.menu');
        $this->db->select('m.url');
        $this->db->select('m.descricao');
        $this->db->select('m.icone');
        $this->db->select('p.menu as menu_pai');
        $this->db->join('menu p', 'p.id_menu = m.id_menu_pai', 'LEFT');

        return $this->db->get_where("{$this->getTable()} m", $where, $limit)->result();
    }

}