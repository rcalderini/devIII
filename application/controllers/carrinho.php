<?php

class Carrinho extends SITE_Controller {

    const STATUS_PAGAMENTO = 'AGUARDANDO PAGAMENTO';
    const PAGAMENTO_VENDEDOR = 1;
    const PAGAMENTO_PAGSEGURO = 2;

    public function carrinho() {
        parent::__construct();

        $this->load->model('produto_model');
//        $this->load->model('pedido_model');
    }

    function index() {
        $data = array();
        
        $this->loadView('site/carrinho/index', $data);
    }

    public function insere_produto() {
        $id_produto = $this->input->post('id_produto');
        $qtd = $this->input->post('quantidade');

        $produto = $this->produto_model->findOne(array("id_produto" => $id_produto));

        $nome = $produto->produto;
        $price = $produto->valor;
        $image = ($produto->imagem) ? $produto->imagem : '';

        $iten = array(
            'id' => $id_produto,
            'name' => $nome,
            'price' => $price * $qtd,
            'preco_unitario' => $price,
            'qty' => $qtd,
            'imagem' => $image
        );

            $rowId = $this->cart->get_rowid($iten);

            $row = $this->cart->get_item($rowId);
            if ($row) {
                $this->cart->update(array(
                    'rowid' => $rowId,
                    'qty' => $row['qty'] + $qtd,
                ));
            } else {
                $this->cart->insert($iten);
            }

            $ret['valor'] = number_format($this->cart->total(), 2, ',', '.');
            $ret['itens'] = $this->cart->total_items();

            echo json_encode($ret);
    }

    public function atulizar_header_carrinho() {
        $ret['valor'] = number_format($this->cart->total(), 2, ',', '.');
        $ret['itens'] = $this->cart->total_items();

        echo json_encode($ret);
    }

    /* Atualiza carrinho */

    public function update_carrinho() {
        $rowid = $this->input->post('rowId');
        $qnt = $this->input->post('qnt');

        $iten = $this->cart->get_item($rowid);
        $dif = $qnt - $iten['qty'];
        $iten['qty'] += $dif - $iten['qty'];

//        if($this->verificaPacoteCombo($iten, $qnt)) {
            $this->cart->update(array(
                'rowid' => $rowid,
                'qty' => $qnt,
            ));

            echo json_encode(array('ok' => 'ok'));
//        } else {
//            echo json_encode(array('aviso' => 'Você não possue uma viagem para este combo'));
//        }
    }

    public function remove_item_carrinho() {
        $rowid = $this->input->post('rowId');

        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($data);

        $this->load->view('site/carrinho/load_carrinho');
    }

    public function updateCart() {
        $this->load->view('site/carrinho/load_carrinho');
    }

}
