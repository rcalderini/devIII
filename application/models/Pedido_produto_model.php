<?php

class Pedido_produto_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('pedido_produto');
        $this->setExclusaoLogica(true);
    }
    
}