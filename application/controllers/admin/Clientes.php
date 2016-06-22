<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
    }

    public function index()
    {
        $data['header_table'] = array(
                                'nome' => 'Nome',
                                'email' => 'Email',
                                'id_cliente' => 'Ações');

        $data['lista_itens'] = $this->cliente_model->findAll();
        $data['controller'] = 'clientes';
        $data['table_title'] = 'Cliente';

        $data['user'] = array();
        $this->loadView('admin/template/listar_view', $data);
    }


    public function remover($id_clientes)
    {
        $this->clientes_model->removeItem(array('id_cliente' => $id_clientes));

        $html = '<div class="content-box" id="mensagem" style="width:35%; float:right;">
                 <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check alert-icon "></i>
                    <strong>Ok! </strong>Cliente Removido com sucesso
                 </div></div>';

        echo $html;
    }

}
