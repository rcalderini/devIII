<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
    }

    public function index()
    {
        $data['header_table'] = array(
                                'menu' => 'Menu ',
                                'menu_pai' => 'Menu Pai',
                                'url' => 'Url',
                                'descricao' => 'Descrição',
                                'icone' => 'Icone',
                                'id_menu' => 'Ações');

        $data['lista_itens'] = $this->menu_model->findAll();
        $data['controller'] = 'menu';
        $data['table_title'] = 'Menu';

        $this->loadView('admin/template/listar_view', $data);
    }

    public function criar() {
        $data['menu_pai'] = $this->menu_model->findAll();

        $this->loadView('admin/menu/criar_view', $data);
    }

    public function salvar() {
        $data['menu'] = $this->input->post('menu');
        $data['id_menu_pai'] = $this->input->post('id_menu_pai');
        $data['url'] = $this->input->post('url');
        $data['descricao'] = $this->input->post('descricao');

        $sucesso = $this->menu_model->insertItem((object) $data);

        if($sucesso) {
            redirect('menu');
        }
    }

    public function editar($id_menu = '') {
        if($id_menu) {
            $where['id_menu'] = $id_menu;

            $data['menu'] = $this->menu_model->findOne($where);

            $this->loadView('admin/menu/editar_view', $data);
        } else {
            redirect('menu/criar');
        }
    }

    public function atualizar() {
        // pergar itens post
        $where['id_menu'] = $this->input->post('id_menu');

        $data['menu'] = $this->input->post('menu');
        $data['id_menu_pai'] = $this->input->post('id_menu_pai');
        $data['url'] = $this->input->post('url');
        $data['descricao'] = $this->input->post('descricao');
        $data['icone'] = $this->input->post('icone');
//var_dump( $where);die;
        $this->menu_model->atualizaItem((object) $data, $where);

        redirect('menu', 'location');
    }

}
