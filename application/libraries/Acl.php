<?php

/**
 * Created by PhpStorm.
 * User: Roger William
 * Date: 12/12/2015
 * Time: 14:54
 */
class Acl
{
    /**
     * @var array multidimencional
     */
    private $_listRules;

    /**
     * @var array multidimencional
     */
    private $_access;


    public function setListRules(array $listRules = array())
    {
        $this->_listRules = $listRules;
    }

    /**
     * Constroi array multidimencional com as regras de acesso do usuario
     * Ex
     *
     *  array(
     *      'produtos' => array(
     *                      'listar' => true
     *                      'editar' => true
     *                      'deletar' => false)
     *      )
     *
     * @return void
     */
    public function setAcl()
    {
        foreach ($this->_listRules as $rule) {
            $this->_access[$rule->controller][$rule->action] = true;
        }
    }

    /**
     * Obtem lista de acesso do usuário
     *
     * @return array
     */
    public function getAccess()
    {
        return $this->_access;
    }

    public function setAccess($access)
    {
        $this->_access = $access;
    }

    /**
     * Verifica se o usuário ter permissão para acessar determinado controles => action
     *
     * @param string $controller
     * @param string $action
     * @return bool
     */
    public function verifyAccess($controller = '', $action = '')
    {
        if (isset($this->_access[$controller][$action])) {
            return $this->_access[$controller][$action];
        }

        return false;
    }
}