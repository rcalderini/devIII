<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends SITE_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = array();
        $this->loadView('site/home/index',$data);
    }
}
