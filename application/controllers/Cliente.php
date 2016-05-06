<<<<<<< HEAD
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = array();
        $this->load->view('site/home/index');
    }

    public function registro() {
        $this->load->view('site/cliente/registro');
    }
}
=======
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
    }

    public function index()
    {
        //$data['user'] = array();
        $this->loadView('site/cliente/index');
    }

    public function cadastrar() {
        //$data['user'] = array();
        $this->loadView('site/cliente/cadastrar');
    }

    public function salvar(){
        // pergar itens post
        $data['email'] = $this->input->post('email');
        $data['ativo'] = 'S';
        //echo $data['email'];
        //echo $this->input->post('nome');
        //echo $this->input->post('sobrenome');
        //echo $this->input->post('senha');
        //die;
        if ($this->cliente_model->findOne($data)){
            $this->session->set_flashdata('erro', 'Cliente já cadastrado!');

            $data['nome'] = $this->input->post('nome');
            //$data['senha'] = $this->usuario_model->encrypt->encode($this->input->post('senha'));
            //$data['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $this->session->cliente = (object) $data;

            redirect('cliente/cadastrar/', 'location');

        }else{
            $data['nome'] = $this->input->post('nome').' '.$this->input->post('sobrenome');;
            $data['senha'] = $this->cliente_model->encrypt->encode($this->input->post('senha'));
            //$data['id_tipo_usuario'] = $this->input->post('id_tipo_usuario');

            $sucesso = $this->cliente_model->insertItem((object) $data);

            if($sucesso) {
                $this->session->set_flashdata('ok', 'Cadastrado com sucesso!');
                redirect('cliente');
            }
        }
    }
}
>>>>>>> 9a14697da2afb117688e71967f314cb45520f30f
