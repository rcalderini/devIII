<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Marcio
 * Date: 09/12/15
 * Time: 20:30
 * To change this template use File | Settings | File Templates.
 */
//use \Base_model;
require_once APPPATH .'libraries/Acl.php';

class User_model extends My_Model
{
    public function __construct()
    {
        $this->setTable('usuario');
        $this->setExclusaoLogica(true);
    }

    public function login($email, $password)
    {
        $data['ativo'] = 'S';
        $data['email ='] = $email;

        $user = $this->findOne($data);

        if ($password === $this->encrypt->decode($user->senha)) {
            $this->session->user = $user;
            $this->session->token_back = sha1($user->id_usuario . $user->email);
            $this->session->menu = $this->setMenu($user->id_tipo_usuario);

            //$this->setAcl($user->id_usuario);

            return true;
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

        $user = $this->findOne($data);

        if ($user ) {
            return $user;
        }

        return false;

    }

    protected function getRules($id_user) {
        $this->db->select('controller');
        $this->db->select('action');
        $this->db->from('regras r');
        $this->db->where('u.id_usuario', $id_user);
        $this->db->where('u.ativo', 'S');
        $this->db->where('tu.ativo', 'S');
        $this->db->join('regras_tipo_usuario rtu', 'rtu.id_regras = r.id_regras');
        $this->db->join('tipo_usuario tu', 'tu.id_tipo_usuario = rtu.id_tipo_usuario');
        $this->db->join('usuario u', 'u.id_tipo_usuario = tu.id_tipo_usuario');

        return $this->db->get()->result();
    }

    private function setAcl($id_user) {
        $this->acl->setListRules($this->getRules($id_user));
        $this->acl->setAcl();

        $this->session->acl = serialize($this->acl);
    }

    private function setMenu($id_tipo_usuario) {
        $this->db->select('m.*');
        $this->db->from('menu m');
        $this->db->where('id_tipo_usuario',$id_tipo_usuario);
        $this->db->where('id_menu_pai IS NULL');
        $this->db->join('menu_tipo_usuario mtu', 'mtu.id_menu = m.id_menu');

        $menu = $this->db->get()->result();

        $userMenu = array();
        $i = 0;
        foreach($menu as $item) {
            $userMenu[$i]['menu'] = $item->menu;
            $userMenu[$i]['url'] = $item->url;
            $userMenu[$i]['descricao'] = $item->descricao;
            $userMenu[$i]['icone'] = $item->icone;
            $userMenu[$i]['filhos'] = $this->subMenu($item->id_menu, $id_tipo_usuario);
            $i++;
        }

        return $userMenu;
    }

    private function subMenu($id_menu_pai, $id_tipo_usuario) {
        $itemMenu = array();
        $filhos = $this->filhoMenu($id_menu_pai, $id_tipo_usuario);

        $i = 0;
        foreach($filhos as $menu) {
            $itemMenu[$i]['menu'] = $menu->menu;
            $itemMenu[$i]['url'] = $menu->url;
            $itemMenu[$i]['descricao'] = $menu->descricao;
            $itemMenu[$i]['icone'] = $menu->icone;
            $itemMenu[$i]['filhos'] = $this->subMenu($menu->id_menu, $id_tipo_usuario);
            $i++;
        }

        return $itemMenu;
    }

    private function filhoMenu($id_menu_pai, $id_tipo_usuario) {
        $this->db->select('m.*');
        $this->db->from('menu m');
        $this->db->where('id_tipo_usuario',$id_tipo_usuario);
        $this->db->where('m.id_menu_pai', $id_menu_pai);
        $this->db->join('menu_tipo_usuario mtu', 'mtu.id_menu = m.id_menu');

        return $this->db->get()->result();
    }

    /**
     * Desloga usuário do sistema.
     */
    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('token_back');

        redirect('login', 'location');

    }


    /**
     * Verifica se o usuario tem acesso au uma determinada acao
     * diferente a outra funcao q existe essa retorna somente true or false, sem direcionar para pag de erro
     * @param string $controller
     * @param string $action
     * @return boolean
     *
     */
    function verifica_acesso_acao($controller = '', $action = '')
    {
       $acl = unserialize($this->session->acl);

       if ($acl->verifyAccess($controller, $action)) {
            return true;
       }
        else{
            return false;
        }
    }

}