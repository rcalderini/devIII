<?php

class cliente_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('cliente');
        $this->setExclusaoLogica(true);
    }

    public function getMyPedidos($id_cliente)
    {
        $this->db->select("pr.*");
        $this->db->select("p.*");
        $this->db->select("DATE_FORMAT(p.data,'%d/%m/%Y') as data_pedido", false);
        $this->db->join("pedido_produto pp", "pp.id_pedido = p.id_pedido");
        $this->db->join("produto pr", "pr.id_produto=pp.id_produto");
        $this->db->where("p.id_cliente", $id_cliente);

        return $this->db->get("pedido p")->result();
    }
}