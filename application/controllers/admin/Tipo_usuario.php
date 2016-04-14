<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_usuario extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tipo_usuario_model');
    }

    public function index()
    {
        $data['header_table'] = array(
            'tipo' => 'Tipo Usuário',
            'id_tipo_usuario' => 'Ações');

        $data['lista_itens'] = $this->tipo_usuario_model->findAll();
        $data['controller'] = 'tipo_usuario';
        $data['table_title'] = 'Tipo Usuário';

        $data['user'] = array();
        $this->loadView('admin/template/listar_view', $data);
    }

    public function cancelar()
    {
        if ($this->session->tipo_usuario) {
            $this->session->unset_userdata('tipo_usuario');
        }

        redirect('tipo_usuario');
    }

    public function criar()
    {

        $data = array();

        if ($this->session->tipo_usuario) {
            $data['tipo_usuario'] = $this->session->tipo_usuario;
        }

        $this->loadView('admin/tipo_usuario/criar_view', $data);
    }

    public function salvar()
    {
        // pergar itens post
        $data['tipo'] = $this->input->post('tipo');
        $data['ativo'] = 'S';

        if ($this->tipo_usuario_model->findOne($data)) {
            $this->session->set_flashdata('erro', 'Tipo de Usuário já cadastrado!');

            $this->session->tipo_usuario = (object)$data;

            redirect('tipo_usuario/criar/', 'location');

        } else {
            $sucesso = $this->tipo_usuario_model->insertItem((object)$data);

            if ($sucesso) {
                $this->session->unset_userdata('tipo_usuario');
                $this->session->set_flashdata('ok', 'Tipo de Usuário cadastrado com sucesso!');

                redirect('tipo_usuario');
            } else {
                $this->session->set_flashdata('erro', 'Problema ao cadastrar Tipo de Usuário!Entrar em contato com setor de Informática');
                redirect('tipo_usuario/criar/', 'location');
            }
        }

    }

    public function editar($id_tipo = '')
    {
        $data = array();
        if ($this->session->tipo_usuario) {
            $data['tipo_usuario'] = $this->session->tipo_usuario;
        } elseif ($id_tipo) {
            $where['id_tipo_usuario'] = $id_tipo;

            $data['tipo_usuario'] = $this->tipo_usuario_model->findOne($where);

        } else {
            redirect('tipo_usuario/criar');
        }

        $this->loadView('admin/tipo_usuario/editar_view', $data);
    }

    public function atualizar()
    {
        $data = array();
        $where = array();

        $data['tipo'] = $this->input->post('tipo');

        $where['id_tipo_usuario !='] = $this->input->post('id_tipo_usuario');
        $where['tipo'] = $this->input->post('tipo');
        $where['ativo'] = 'S';

        if ($this->tipo_usuario_model->findOne($where)) {
            $this->session->set_flashdata('erro', 'Tipo de Usuário já cadastrado!');

            $data['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $this->session->tipo_usuario = (object)$data;

            redirect('tipo_usuario/editar/' . $this->input->post('id_tipo_usuario'), 'location');

        } else {
            $where = array();
            $where['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $this->tipo_usuario_model->atualizaItem((object)$data, $where);
            $this->session->unset_userdata('tipo_usuario');

            $this->session->set_flashdata('ok', 'Tipo de Usuário atualizado com sucesso!');

            redirect('tipo_usuario', 'location');
        }

    }

    public function remover($id_tipo_usuario)
    {
        $this->tipo_usuario_model->removeItem(array('id_tipo_usuario' => $id_tipo_usuario));

        $html = '<div class="content-box" id="mensagem" style="width:35%; float:right;">
                 <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check alert-icon "></i>
                    <strong>Ok! </strong>Tipo Usuário Removido com sucesso
                 </div></div>';

        echo $html;
    }

}