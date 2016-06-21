<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produto_model');
    }

    public function index()
    {
        $data['produtos'] = $this->produto_model->findAll();
        $data['user'] = array();
        $this->loadView('site/home/index',$data);
    }

    public function detalhes($id_produto) {
        $data['produto'] = $this->produto_model->findOne(array("id_produto" => $id_produto));
        $data['outros_produtos'] = $this->produto_model->findAll(array("id_produto" => $id_produto));

        $this->loadView("site/produto/detalhes",$data);
    }
}
