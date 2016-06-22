<?php

class Pedidos_site_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('pedido');
        $this->setExclusaoLogica(true);
    }

    public function findPedidos()
    {
        $this->db->select("pr.*");
        $this->db->select("c.nome as cliente");
        $this->db->select("DATE_FORMAT(p.data,'%d/%m/%Y') as data_pedido", false);
        $this->db->join("pedido_produto pp", "pp.id_pedido = p.id_pedido");
        $this->db->join("produto pr", "pr.id_produto=pp.id_produto");
        $this->db->join("cliente c", "c.id_cliente=p.id_cliente");

        return $this->db->get("pedido p")->result();
    }
}