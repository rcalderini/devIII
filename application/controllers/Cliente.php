<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('autenticacao_model');
        $this->load->model('Pedidos_site_model');
    }

    public function index()
    {
        $this->check_auth();
        $this->loadView('site/cliente/index');
    }

    public function cadastrar() {
        $this->load->helper('form');
        $this->loadView('site/cliente/cadastrar');
    }

    public function salvar($acao = ''){
        // pegar itens post
        $data['email'] = $this->input->post('email');
        $data['ativo'] = 'S';
        if ($acao != 'editar' && $this->cliente_model->findOne($data)){
            $this->session->set_flashdata('erro', 'Email já cadastrado em nossa loja!');
            $data['nome'] = $this->input->post('nome');

            redirect('cliente/cadastrar/', 'location');

        }else{
            $data['nome'] = $this->input->post('nome').' '.$this->input->post('sobrenome');;
            if ($acao != 'editar')
                $data['senha'] = $this->cliente_model->encrypt->encode($this->input->post('senha'));

            $sucesso = $this->cliente_model->insertItem((object) $data);

            if($sucesso) {
                $this->session->set_flashdata('ok', 'Cadastrado com sucesso!');
                $this->autenticacao_model->login($data['email'], $this->input->post('senha'));
                redirect('cliente');
            }
        }
    }

    public function history() {
        $data['pedidos'] = $this->cliente_model->getMyPedidos($this->getClienteId());
        //$cliente['id_cliente'] = $this->getClienteId();
        //$data['pedidos'] = $this->Pedidos_site_model->findAll($cliente);
        $this->loadView('site/cliente/meus_pedidos',$data);
    }

    public function meus_dados() {
        $cliente['id_cliente'] = $this->getClienteId();
        $cliente['ativo'] = 'S';

        $data['cliente'] = $this->cliente_model->findOne($cliente);

        $this->loadView('site/cliente/editar',$data);
    }

    public function logout(){
        $this->autenticacao_model->logout();
    }

    public function login(){
        if ($this->input->post()) {
            $data['email'] = $this->input->post('email');
            $data['senha'] = $this->input->post('senha');

            $sucesso = $this->autenticacao_model->login($data['email'],$data['senha']);

            if($sucesso){
                redirect('home');
            }else{
                $this->session->set_flashdata('erro', 'Usuário ou senha inválidos.');
                $this->loadView('site/cliente/login');
            }
        } else {
            $this->loadView('site/cliente/login');
        }
    }
}
