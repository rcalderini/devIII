<?php
/**
 * Created by PhpStorm.
 * User: Roger William
 * Date: 05/10/2015
 * Time: 16:40
 */

class tipo_usuario_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('tipo_usuario');
        $this->setExclusaoLogica(true);
    }
}