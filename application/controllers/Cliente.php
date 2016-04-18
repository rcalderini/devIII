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
