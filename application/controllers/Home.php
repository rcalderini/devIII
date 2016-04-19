<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //echo this->template;
        //edie;
        $data['user'] = array();
        //$this->load->view('site/home/index');
        $this->loadView('site/home/index',$data);
    }

    public function delete() {

    }
}
