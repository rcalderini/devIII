<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('array_to_csv')) {

    function array_to_csv($array, $delim = ",", $newline = "\n", $enclosure = '"') {
        $out = '';

        foreach ($array as $row) {
            foreach ($row as $item) {
                $out .= $enclosure . str_replace($enclosure, $enclosure . $enclosure, $item) . $enclosure . $delim;
            }
            $out = rtrim($out);
            $out .= $newline;
        }

        return $out;
    }

}