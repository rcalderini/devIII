<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->model('tipo_usuario_model');
    }

    public function index()
    {
        $data['header_table'] = array(
                                'nome' => 'Nome',
                                'email' => 'Email',
                                'id_tipo_usuario' => 'Tipo Usuário',
                                'id_usuario' => 'Ações');

        $data['lista_itens'] = $this->usuario_model->findAll();
        $data['controller'] = 'usuario';
        $data['table_title'] = 'Usuário';

        $data['user'] = array();
        $this->loadView('admin/template/listar_view', $data);
    }

    public function cancelar() {
        if ($this->session->usuario) {
            $this->session->unset_userdata('usuario');
        }

        redirect('admin/usuario');
    }

    public function criar() {

        $data = array();

        $data['tipo_usuario'] = $this->tipo_usuario_model->findall();

        if ($this->session->usuario) {
            $data['usuario'] = $this->session->usuario;
        }


        $this->loadView('admin/usuario/criar_view', $data);
    }

    public function salvar() {
        // pergar itens post
        $data['email'] = $this->input->post('email');
        $data['ativo'] = 'S';

        if ($this->usuario_model->findOne($data)){
            $this->session->set_flashdata('erro', 'Usuário já cadastrado!');

            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->usuario_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $this->session->usuario = (object) $data;

            redirect('admin/usuario/criar/', 'location');

        }else{
            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->usuario_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $sucesso = $this->usuario_model->insertItem((object) $data);

            if($sucesso) {
                $this->session->unset_userdata('usuario');
                $this->session->set_flashdata('ok', 'Usuário cadastrado com sucesso!');
                redirect('usuario');
            }
        }
    }

    public function editar($id_usuario = '') {

        $data = array();
        $data['tipo_usuario'] = $this->tipo_usuario_model->findall();

        if ($this->session->usuario) {
            $data['usuario'] = $this->session->usuario;
        }
        elseif($id_usuario) {
            $where['id_usuario'] = $id_usuario;

            $data['usuario'] = $this->usuario_model->findOne($where);

        } else {
            redirect('admin/usuario/criar');
        }

        $this->loadView('admin/usuario/editar_view', $data);
    }

    public function atualizar() {
        // pergar itens post
        $data = array();
        $where = array();
        $data['email'] = $this->input->post('email');

        //$where = array('id_usuarios !=' => $this->input->post('id_usuario'));
        $where['id_usuario !='] = $this->input->post('id_usuario');
        $where['email'] = $this->input->post('email');
        $where['ativo'] = 'S';

        if ($this->usuario_model->findOne($where)){
            $this->session->set_flashdata('erro', 'Usuário já cadastrado!');

            $data['id_usuario'] = $this->input->post('id_usuario');
            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->usuario_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $this->session->usuario = (object) $data;

            redirect('admin/usuario/editar/'.$this->input->post('id_usuario'), 'location');

        }else{
            $where = array();

            $where['id_usuario'] = $this->input->post('id_usuario');

            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->usuario_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $this->usuario_model->atualizaItem((object) $data, $where);
            $this->session->unset_userdata('usuario');

            $this->session->set_flashdata('ok', 'Usuário atualizado com sucesso!');

            redirect('admin/usuario', 'location');
        }
    }

    public function remover($id_usuario)
    {
        $this->usuario_model->removeItem(array('id_usuario' => $id_usuario));

        $html = '<div class="content-box" id="mensagem" style="width:35%; float:right;">
                 <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check alert-icon "></i>
                    <strong>Ok! </strong>Usuário Removido com sucesso
                 </div></div>';

        echo $html;
    }

}
