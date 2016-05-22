<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produto_model');
    }

    public function index()
    {
        $data['header_table'] = array(
                                'produto' => 'Produto',
                                'valor' => 'Valor',
                                'estoque' => 'Quantidade em Estoque',
                                'id_produto' => 'Ações');

        $data['lista_itens'] = $this->produto_model->findAll();
        $data['controller'] = 'produto';
        $data['table_title'] = 'Produtos';

        $data['user'] = array();
        $this->loadView('admin/template/listar_view', $data);
    }

    public function cancelar() {
        if ($this->session->produto) {
            $this->session->unset_userdata('produto');
        }

        redirect('admin/produto');
    }

    public function criar() {

        $data = array();

        $this->loadView('admin/produto/criar_view', $data);
    }

    public function salvar() {
        // pergar itens post
        $data['produto'] = $this->input->post('produto');
        $data['valor'] = $this->input->post('valor');
        $data['estoque'] = $this->input->post('estoquee');

        if ($this->produto_model->findOne($data)){
            $this->session->set_flashdata('erro', 'Usuário já cadastrado!');

            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->produto_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_produto'] = $this->input->post('id_tipo_produto');

            $this->session->produto = (object) $data;

            redirect('admin/produto/criar/', 'location');

        }else{
            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->produto_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_produto'] = $this->input->post('id_tipo_produto');

            $sucesso = $this->produto_model->insertItem((object) $data);

            if($sucesso) {
                $this->session->unset_userdata('produto');
                $this->session->set_flashdata('ok', 'Usuário cadastrado com sucesso!');
                redirect('produto');
            }
        }
    }

    public function editar($id_produto = '') {

        $data = array();
        $data['tipo_produto'] = $this->tipo_produto_model->findall();

        if ($this->session->produto) {
            $data['produto'] = $this->session->produto;
        }
        elseif($id_produto) {
            $where['id_produto'] = $id_produto;

            $data['produto'] = $this->produto_model->findOne($where);

        } else {
            redirect('admin/produto/criar');
        }

        $this->loadView('admin/produto/editar_view', $data);
    }

    public function atualizar() {
        // pergar itens post
        $data = array();
        $where = array();
        $data['email'] = $this->input->post('email');

        //$where = array('id_produtos !=' => $this->input->post('id_produto'));
        $where['id_produto !='] = $this->input->post('id_produto');
        $where['email'] = $this->input->post('email');
        $where['ativo'] = 'S';

        if ($this->produto_model->findOne($where)){
            $this->session->set_flashdata('erro', 'Usuário já cadastrado!');

            $data['id_produto'] = $this->input->post('id_produto');
            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->produto_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_produto'] = $this->input->post('id_tipo_produto');

            $this->session->produto = (object) $data;

            redirect('admin/produto/editar/'.$this->input->post('id_produto'), 'location');

        }else{
            $where = array();

            $where['id_produto'] = $this->input->post('id_produto');

            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $this->produto_model->encrypt->encode($this->input->post('senha'));
            $data['id_tipo_produto'] = $this->input->post('id_tipo_produto');

            $this->produto_model->atualizaItem((object) $data, $where);
            $this->session->unset_userdata('produto');

            $this->session->set_flashdata('ok', 'Usuário atualizado com sucesso!');

            redirect('admin/produto', 'location');
        }
    }

    public function remover($id_produto)
    {
        $this->produto_model->removeItem(array('id_produto' => $id_produto));

        $html = '<div class="content-box" id="mensagem" style="width:35%; float:right;">
                 <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check alert-icon "></i>
                    <strong>Ok! </strong>Usuário Removido com sucesso
                 </div></div>';

        echo $html;
    }

}
