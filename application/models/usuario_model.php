<?php
/**
 * Created by PhpStorm.
 * User: Roger William
 * Date: 05/10/2015
 * Time: 16:40
 */

class usuario_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('usuario');
        $this->setExclusaoLogica(true);
    }
}