<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends ADMIN_Controller
{
    public $imgs = array(
        'imagem' => array(
            'width' => 357,
            'height'=> 515,
            'params'=> array(
                'aceitaMenor' => true,
                'thumb'		  => array(
                    'width'		  => 240,
                    'height'	  => 150)
            )
        ),
    );
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produto_model');
        $this->load->library('image_lib');
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

    public function cancelar()
    {
        if ($this->session->produto) {
            $this->session->unset_userdata('produto');
        }

        redirect('admin/produto');
    }

    public function criar()
    {

        $data = array();

        $this->loadView('admin/produto/criar_view', $data);
    }

    public function salvar()
    {
        // pergar itens post
        $data['produto'] = $this->input->post('produto');
        $data['valor'] = $this->input->post('valor');
        $data['estoque'] = $this->input->post('estoque');

        // UPLOAD DAS IMAGENS
        foreach($this->imgs as $key => $value) {
            $img_nome = $this->image_lib->upload_foto($key, $value['width'], $value['height'], 'produtos_fotos', $value['params']);

            if(!is_array($img_nome)) {
                $data[$key] = $img_nome;
            }
        }

        $sucesso = $this->produto_model->insertItem((object)$data);

        if ($sucesso) {
            $this->session->unset_userdata('produto');
            $this->session->set_flashdata('ok', 'Produto cadastrado com sucesso!');
            redirect('admin/produto');
        }
    }

    public function editar($id_produto = '')
    {
        $data = array();
        $where['id_produto'] = $id_produto;

        $data['produto'] = $this->produto_model->findOne($where);

        $this->loadView('admin/produto/editar_view', $data);
    }

    public function atualizar()
    {
        // pergar itens post
        $data = array();
        $where = array();

        $where['id_produto'] = $this->input->post('id_produto');

        // pergar itens post
        $data['produto'] = $this->input->post('produto');
        $data['valor'] = $this->input->post('valor');
        $data['estoque'] = $this->input->post('estoque');

        $this->produto_model->atualizaItem((object)$data, $where);
        $this->session->unset_userdata('produto');

        $this->session->set_flashdata('ok', 'Produto atualizado com sucesso!');

        redirect('admin/produto', 'location');
    }

    public function remover($id_produto)
    {
        $this->produto_model->removeItem(array('id_produto' => $id_produto));

        $html = '<div class="content-box" id="mensagem" style="width:35%; float:right;">
                 <div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check alert-icon "></i>
                    <strong>Ok! </strong>Produto Removido com sucesso
                 </div></div>';

        echo $html;
    }

    public function inserir_banner() {
        $banner_arquivo = $this->upload_foto('banners', 1170, 550);

        if (is_array($banner_arquivo)) {
            $this->session->set_flashdata('errors', 'Houve um problema no upload da imagem do banner.');

            redirect('admin/banner', 'location');
        } else {
            $dados['titulo'] = $this->input->post('titulo');
            $dados['link'] = prep_url($this->input->post('link'));
            $dados['sin_ativo'] = $this->input->post('sin_ativo');
            $dados['arquivo'] = $banner_arquivo;

            $id_banner = $this->banner_model->set_banner($dados);
            $this->session->set_flashdata('messages', 'Banner inserido com sucesso.');

            if ($id_banner) {
                $this->session->set_flashdata('messages', 'Banner inserido com sucesso.');
            } else {
                $this->session->set_flashdata('errors', 'Falha ao inserir Banner.');
            }
        }

        redirect('admin/banner');
    }

}
