<?php

require_once APPPATH .'libraries/Acl.php';

class Autenticacao_Model extends My_Model
{
    public function __construct()
    {
        $this->setTable('cliente');
        $this->setExclusaoLogica(true);
    }

    /*
    * Verifica login
    * Caso dados estejam corretos, loga cliente no site
    * Caso contrário retorna falso
    **/
    public function login($email, $password)
    {
        $data['ativo'] = 'S';
        $data['email ='] = $email;

        $cliente = $this->findOne($data);

        if($cliente != null){
            if ($password === $this->encrypt->decode($cliente->senha)) {
                $this->session->cliente = $cliente;
                $this->session->token_back_site = sha1($cliente->id_cliente . $cliente->email);

                return true;
            }
        }
        return false;
    }

    /*
     * verifica se existe um email cadastrado
     * */
    public function verificar_email($email)
    {
        $data['ativo'] = 'S';
        $data['email'] = $email;

        $cliente = $this->findOne($data);

        if ($cliente) {
            return $cliente;
        }

        return false;

    }

    /**
     * Desloga cliente do site.
     */
    public function logout()
    {
        $this->session->unset_userdata('cliente');
        $this->session->unset_userdata('token_back_site');

        redirect('home', 'location');

    }
}