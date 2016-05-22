<?php

class produto_model extends MY_Model
{
    function __construct()
    {
        $this->setTable('produto');
        $this->setExclusaoLogica(true);
    }
}