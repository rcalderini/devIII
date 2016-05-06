<?php

class cliente_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('cliente');
        $this->setExclusaoLogica(true);
    }
}