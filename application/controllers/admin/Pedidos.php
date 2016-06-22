<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pedidos_site_model');
    }

    public function index()
    {
        $pedidos = $this->pedidos_site_model->findPedidos();

        $d = array();
        foreach($pedidos as $row) {
            $d['cliente'][$row->id_pedido] = $row->cliente;
            $d['itens'][$row->id_pedido] .= $row->produto."<br/>";
            $d['total'][$row->id_pedido] = $row->total;
            $d['data_pedido'][$row->id_pedido] = $row->data_pedido;
        }
        $data['pedidos'] = $d;

        $this->loadView('admin/template/listar_pedidos_view', $data);
    }
}
