<?php

function get_nome_from_enum($table, $field, $value) {
    $CI = & get_instance();
    $CI->load->library('enum');
    return Enum::$enums[$table][$field][$value];
}