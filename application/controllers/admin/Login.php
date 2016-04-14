<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by JetBrains PhpStorm.
 * User: Marcio
 * Date: 09/12/15
 * Time: 21:02
 * To change this template use File | Settings | File Templates.
 */
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('admin/login/login_view');
    }

    function esquecer_senha()
    {
        $this->load->view('admin/login/esquecer_senha_view');
    }

    function erro()
    {
        $data = array();

        $this->load->view('admin/login/login_view', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'location');
    }

    function logar()
    {
        $retorno = $this->user_model->login($this->input->post('username'), $this->input->post('password'));

        if ($retorno) {
            redirect('home');
        } else {
            $this->session->set_flashdata('erro', 'Usuário ou senha incorreto!');
            redirect('login');
        }
    }


    function enviar_senha()
    {
        $user = $this->user_model->verificar_email($this->input->post('username'));

        if ( $user ){
            $msg = '<!DOCTYPE HTML><html><head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                </head>
                       <body>
                            <br/>
                            <img  src="'.base_url().'assets/site/images/logo.png" style="float:left" height="40" />
                               <br/><br/><br/><br/>

                                Segue seus dados para acessar o sistema!<br/>
                                Usuário: '.$user->email.'<br/>
                                Senha: '.$this->user_model->encrypt->decode($user->senha).'<br/><br/>

                               <br/>
                               <br/>
                        </body>
                </html>';

            $this->login_model->enviarEmail('contato@rdfstands.com.br', 'RDF Stands', $user->email, 'Senha acesso ao sistema da RDF Stands ', $msg, '', '', '');

            $this->session->set_flashdata('ok', 'Um email foi enviado com sua senha!');

        }
        else{
            $this->session->set_flashdata('erro', 'Usuário não cadastrado!');
        }

        redirect('login/esquecer_senha');

    }

}