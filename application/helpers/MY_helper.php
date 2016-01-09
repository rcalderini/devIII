<?php
/**
 * Created by PhpStorm.
 * User: Roger William
 * Date: 14/12/2015
 * Time: 23:28
 */

if (!function_exists('get_list_table_from_html')) {
    /**
     * Monta uma tabela de listagem baseado no layout Admin Supr
     *
     * onde através de um array chave valor
     * vc diz os campos e as labels
     *
     * Ex:
     * array ( 'tipo' => 'Tipo Usuário',
     *         'ativo' => 'Ativo',
     *          'id_tipo_usuario' => 'Ações')
     *
     * @param array $header
     * @param array $lista
     * @param string $controller
     * @return string
     *

     */
    function get_list_table_from_html($header, $lista, $controller)
    {
        $str = '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%">';
        $str .= '<thead><tr>';
        foreach ($header as $key => $th) {
            if ($th === 'Ações') {
                $str .= '<th align="right" width="5% px">' . $th . '</th>';
            } else {
                $str .= '<th>' . $th . '</th>';
            }
        }
        $str .= '</tr></thead>';
        $str .= '<tbody>';

        $i = 0;
        foreach ($lista as $item) {
            if ($i % 2 == 0) {
                $str .= '<tr class="odd">';
            } else {
                $str .= '<tr class="even">';
            }

            $y = 0;
            foreach ($header as $key => $val) {
                if ($y == 0) {
                    $valor = $item->$key;
                }
                $y++;

                if ($val === 'Ações') {
                    $str .= '<td align="right" >';
                    $str .= '<div class="controls right" >';

                if (verifica_acesso_acao($controller, 'editar')) {
                    $str .= '<a href = "' . $controller . '/editar/' . $item->$key . '" class="tip" oldtitle = "Editar" title = "Editar" data - hasqtip = "true" aria - describedby = "qtip-13" ><span class="icon12 icomoon-icon-pencil" ></span ></a >';
                }

                if (verifica_acesso_acao($controller, 'remover')) {
                    $str .= '<a href = "#" class="delete-modal" data-valor="' . $valor . '" data-controller="' . $controller . '" data-id="' . $item->$key . '" class="tip" oldtitle = "Excluir" title = "Excluir" data - hasqtip = "true" ><span class="icon12 icomoon-icon-remove" ></span ></a >';
                }
                $str .= '   </div >';

                } else {
                    $str .= '<td>';
                    $str .= $item->$key;
                }
                $str .= '</td>';
            }
            $str .= '</tr>';
        }

        $str .= '</tbody >';
        $str .= '<tfoot><tr>';
        foreach ($header as $key => $th) {
            $str .= '<th>' . $th . '</th>';
        }
        $str .= '</tr></tfoot></table > ';

        return $str;
    }
}

if (!function_exists('get_menu_from_html')) {
    function get_menu_from_html(array $menu)
    {
        $str = '<ul>';
        foreach ($menu as $item) {
            $str .= '<li>';
            $str .= '<a href="' . $item['url'] . '"><i class="s16 ' . $item['icone'] . '"></i><span class="txt">' . $item['menu'] . '</span></a>';
            if (count($item['filhos']) > 0) {
                $str .= subMenu($item['filhos']);
            }
            $str .= '</li>';
        }
        return $str;
    }
}

/**
 * @param array $menu
 * @return string
$userMenu[$i]['item'] = $menu->item;
 * $userMenu[$i]['url'] = $menu->url;
 * $userMenu[$i]['descricao'] = $menu->descricao;
 * $userMenu[$i]['filhos'] =
 */
function subMenu($menu = array())
{
    $str = '<ul class="sub">';
    foreach ($menu as $item) {
        $str .= '<li><a href="' . $item['url'] . '"><i class="s16 ' . $item['icone'] . '"></i><span class="txt">' . $item['menu'] . '</span></a></li>';
    }
    $str .= '</ul>';

    return $str;
}


/**
 * Verifica se o usuario tem acesso au uma determinada acao
 * diferente a outra funcao q existe essa retorna somente true or false, sem direcionar para pag de erro
 * @param string $controller
 * @param string $action
 * @return boolean
 *
 */
if (!function_exists('verifica_acesso_acao')) {
    function verifica_acesso_acao($controller = '', $action = '')
    {

        $CI = & get_instance();
        $acl = unserialize($CI->session->acl);

        return $acl->verifyAccess($controller, $action);
    }
}

