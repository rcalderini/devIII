<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('autenticacao_model');
    }

    public function finalizado()
    {
        $this->check_auth();
        $this->loadView('site/pedido/finalizado', 
            array(
                'pedidoId' => $this->session->userdata('pedidoId')
            )
        );
    }

}
