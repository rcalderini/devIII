<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('autenticacao_model');
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

    public function salvar(){
        // pegar itens post
        $data['email'] = $this->input->post('email');
        $data['ativo'] = 'S';
        if ($this->cliente_model->findOne($data)){
            $this->session->set_flashdata('erro', 'Cliente já cadastrado!');
            $data['nome'] = $this->input->post('nome');

            redirect('cliente/cadastrar/', 'location');

        }else{
            $data['nome'] = $this->input->post('nome').' '.$this->input->post('sobrenome');;
            $data['senha'] = $this->cliente_model->encrypt->encode($this->input->post('senha'));

            $sucesso = $this->cliente_model->insertItem((object) $data);

            if($sucesso) {
                $this->session->set_flashdata('ok', 'Cadastrado com sucesso!');
                $this->autenticacao_model->login($data['email'], $this->input->post('senha'));
                redirect('cliente');
            }
        }
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
                $this->session->set_flashdata('error', 'Usuário ou senha inválidos');
                redirect('home');
            }else{
                $this->session->set_flashdata('error', 'Usuário ou senha inválidos');
                $this->loadView('site/cliente/login');
            }
        } else {
            $this->loadView('site/cliente/login');
        }
    }
}
