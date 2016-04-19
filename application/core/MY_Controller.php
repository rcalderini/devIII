<?php
class MY_Controller extends CI_Controller
{
    protected $template = '';

    public function __construct($controller = '')
    {
        parent::__construct();

        $this->load->model('user_model');
    }

    public function loadView($view, $params = array())
    {
        $params['CONTENT'] = $view;
        //$params['MENU'] = $this->session->menu;
        $this->load->view($this->template, $params);
    }
}


class ADMIN_Controller extends MY_Controller
{
    protected $template = 'admin/layout/main';

    public function __construct($controller = '')
    {
        parent::__construct();

        $this->check_auth();
        $this->verifica_acesso();
    }

    public function setUser($user)
    {
        $this->session->user = $user;
    }

    public function getUser()
    {
        return $this->session->user;
    }

    public function getUserId()
    {
        return $this->session->user->id_user;
    }

    private function check_auth()
    {
        if ($this->session) {
            $token = sha1($this->getUser()->id_usuario . $this->getUser()->email);

            if ($token === $this->session->token_back) {
                return true;
            }
        }

        redirect('login');
    }

    /**
     * Verifica se o usuário tem acesso a determinada ação
     * vaso não tenha redireciona para a home
     *
     * Obs: todos os user devem ter acesso a no min a home
     */
    public function verifica_acesso($controller = '', $action = '')
    {
        if (!$controller) {
            $controller = (is_null($this->uri->segment(1))) ? '' : $this->uri->segment(1);
        }
        if (!$action) {
            $action = (is_null($this->uri->segment(2))) ? '' : $this->uri->segment(2);
        }

        $acl = unserialize($this->session->acl);

        if (!$acl->verifyAccess($controller, $action)) {
            redirect('error/error_403');
        }
    }
}

class SITE_Controller extends MY_Controller
{
    protected $template = 'site/layout/main';

    public function __construct($controller = '')
    {
        parent::__construct();
    }
}