<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$CI = & get_instance();

/**
 * Transforma p em br
 *
 * @access	public
 * @param $string string
 * @return	string
 */
if (!function_exists('pToBr')) {

    function pToBr($string) {
        $string = preg_replace("/<\/p>([\s\n]+)?$/s", "", $string); // retira o Ãºltimo fechamento de p
        return str_replace('<p>', '', str_replace('</p>', '<br /><br />', $string)); // substitui fechamentos de p por br
    }

}

if (!function_exists('arrayToUrlSearch')) {

    function arrayToUrlSearch($array) {
        $url = array();

        foreach ($array as $key => $value) {
            if ($key == 'x' || $key == 'y') {
                continue;
            }

            if (!empty($value)) {
                $value = str_replace('/', '-', $value);
                $value = urlencode($value);
                //$url[] = "$key/$value";
                $url[] = "$value";
            }
        }

        return implode('/', $url);
    }

}

if (!function_exists('comprimentaUsuario')) {

    function comprimentaUsuario() {
        $hora_do_dia = date("H");

        if (($hora_do_dia >= 6) && ($hora_do_dia <= 12))
            return "Bom Dia!";
        if (($hora_do_dia > 12) && ($hora_do_dia <= 18))
            return "Boa Tarde!";
        if (($hora_do_dia > 18) && ($hora_do_dia <= 24))
            return "Boa Noite!";
        if (($hora_do_dia > 24) && ($hora_do_dia < 6))
            return "Boa Madrugada!";
    }

}

if (!function_exists('sin_admin')) {

    function sin_admin() {
        return true;
    }

}

if (!function_exists('fullUpper')) {

    function fullUpper($string) {
        return strtr(strtoupper($string), array(
            "à" => "À",
            "è" => "È",
            "ì" => "Ì",
            "ò" => "Ò",
            "ù" => "Ù",
            "á" => "Á",
            "é" => "É",
            "í" => "Í",
            "ó" => "Ó",
            "ú" => "Ú",
            "â" => "Â",
            "ê" => "Ê",
            "î" => "Î",
            "ô" => "Ô",
            "û" => "Û",
            "ç" => "Ç",
        ));
    }

}

if (!function_exists('arrayToInputHidden')) {

    function arrayToInputHidden($array, $ignoreKeys = array()) {
        $html = '';

        foreach ($ignoreKeys as $value) {
            unset($array[$value]);
        }

        foreach ($array as $key => $value) {
            $html .= '<input type="hidden" name="' . $key . '" value="' . $value . '" />';
        }

        return $html;
    }

}
if (!function_exists('get_data_for_mysql_format')) {

    /**
     * Tranforma uma data para formado de banco de dados mysql
     * Ex : $date[dia], $date[mes], $date[ano]
     * retorna a data ano-mes-dia - 1900-01-01.
     *
     * @access	public
     * @param $date array
     * @return	string
     */
    function get_data_for_mysql_format($date) {
        if ($date == false)
            return null;

        if (is_array($date)) {
            if (isset($date['dia']) && isset($date['mes']) && isset($date['ano']) &&
                    $date['dia'] && $date['mes'] && $date['ano']) {
                $dia = $date['dia'];
                $mes = $date['mes'];
                $ano = $date['ano'];
            }
        } else {
            $data = explode('/', $date);
            if (count($data) != 3)
                return null;

            list($dia, $mes, $ano) = $data;
        }
        return "$ano-$mes-$dia";
    }

}

if (!function_exists('get_data_hour_for_mysql_format')) {

    /**
     * Tranforma uma data hora para formado de banco de dados mysql
     * Ex : $date[dia], $date[mes], $date[ano]
     * retorna a data ano-mes-dia - 1900-01-01 03:16:37.
     *
     * @access	public
     * @param $date array
     * @return	string
     */
    function get_data_hour_for_mysql_format($date) {
        if ($date == false)
            return null;

        if (is_array($date)) {
            if (isset($date['dia']) && isset($date['mes']) && isset($date['ano']) &&
                    $date['dia'] && $date['mes'] && $date['ano']) {
                $dia = $date['dia'];
                $mes = $date['mes'];
                $ano = $date['ano'];
            }
        } else {
            //01/09/2007 03:16:37
            $dataHora = explode(' ', $date);
            $data = explode('/', $dataHora[0]);
            if (count($data) != 3)
                return null;

            list($dia, $mes, $ano) = $data;
        }
        return "$ano-$mes-$dia $dataHora[1]";
    }

}

if (!function_exists('get_date_from_mysql')) {

    /**
     * Converte a data do formado de banco de dados mysql para formato padrao
     * Ex : dia/mes/ano - 01/01/1900
     *
     * @access	public
     * @param $date array
     * @return	string
     */
    function get_date_from_mysql($date, $format = 'padrao') {
        if ($date) {
            list ($ano, $mes, $dia) = explode('-', $date);

            if ($format == 'array') {
                return array(
                    'dia' => $dia,
                    'mes' => $mes,
                    'ano' => $ano
                );
            }

            return "$dia/$mes/$ano";
        }

        return '';
    }

}
if (!function_exists('get_nome_mes')) {

    /**
     * Retorna o nome do mes conforme o numero do mês passado
     * Ex : 01 = Janeiro.
     *
     * @access	public
     * @param $numero int
     * @return	string
     */
    function get_nome_mes($numero) {
        $mes = '';
        $numero = sprintf('%02s', $numero);

        switch ($numero) {
            case "01": $mes = 'Janeiro';
                break;
            case "02": $mes = 'Fevereiro';
                break;
            case "03": $mes = 'Março';
                break;
            case "04": $mes = 'Abril';
                break;
            case "05": $mes = 'Maio';
                break;
            case "06": $mes = 'Junho';
                break;
            case "07": $mes = 'Julho';
                break;
            case "08": $mes = 'Agosto';
                break;
            case "09": $mes = 'Setembro';
                break;
            case "10": $mes = 'Outubro';
                break;
            case "11": $mes = 'Novembro';
                break;
            case "12": $mes = 'Dezembro';
                break;
        }

        return $mes;
    }

}

if (!function_exists('getUrlSegmentTo')) {

    /**
     * Retorna o seguimento espeficicado da url 
     * 
     * @param int $segIni incio do segmento da url
     * @param int $segFim fim do segmento da url
     * @return string segmento da url
     */
    function getUrlSegmentTo($segIni, $segFim) {
        $CI = & get_instance();
        $url = '';

        for ($i = $segIni; $i <= $segFim; $i++) {
            $url .= $CI->uri->segment($i) . (($i == $segFim) ? '' : '/');
        }

        return $url;
    }

}