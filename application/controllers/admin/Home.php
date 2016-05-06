<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = array();
        $this->loadView('admin/home/index', $data);
    }

    public function delete() {

    }
}
