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
        $data['pedidos'] = $this->pedido_model->findPedidos();

        $this->loadView('admin/template/listar_pedidos_view', $data);
    }
}
