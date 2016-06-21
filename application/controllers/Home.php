<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produto_model');
    }

    public function index()
    {
        $data['user'] = array();
        $data['produtos'] = $this->produto_model->findAll();

        $this->loadView('site/home/index',$data);
    }
}
