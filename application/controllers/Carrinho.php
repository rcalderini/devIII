<?php

class Carrinho extends SITE_Controller
{

    const STATUS_PAGAMENTO = 'AGUARDANDO PAGAMENTO';
    const PAGAMENTO_VENDEDOR = 1;
    const PAGAMENTO_PAGSEGURO = 2;

    public function carrinho()
    {
        parent::__construct();

        $this->load->model('produto_model');
    }

    function index()
    {
        $data = array();

        $this->loadView('site/carrinho/index', $data);
    }

    public function insere_produto()
    {
        $id_produto = $this->input->post('id_produto');
        $qtd = $this->input->post('quantidade');

        $produto = $this->produto_model->findOne(array("id_produto" => $id_produto));

        $nome = $produto->produto;
        $price = $produto->valor;
        $image = ($produto->imagem) ? $produto->imagem : '';

        $item = array(
            'id' => $id_produto,
            'name' => $nome,
            'price' => $price * $qtd * 0.9,
            'qty' => $qtd,
            'imagem' => $image
        );
        
        $row = $this->cart->get_item(md5($id_produto));
        if ($row) {
            $this->cart->update(array(
                'rowid' => md5($id_produto),
                'qty' => $qtd,
            ));
        } else {
            $this->cart->insert($item);
        }

        redirect('/carrinho/');
    }

    public function atulizar_header_carrinho()
    {
        $ret['valor'] = number_format($this->cart->total(), 2, ',', '.');
        $ret['itens'] = $this->cart->total_items();

        echo json_encode($ret);
    }

    /* Atualiza carrinho */

    public function update_carrinho()
    {
        $rowid = $this->input->post('rowid');
        $qtd = $this->input->post('qtd');
        
        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => $qtd,
        ));

        $html = $this->load->view('site/carrinho/load_carrinho', array(), true);
        
         echo json_encode(array('html' => $html));
         die;
    }

    public function remove_item_carrinho($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($data);

        $html = $this->load->view('site/carrinho/load_carrinho', array(), true);
        
        echo json_encode(array('html' => $html));
        die;
    }

    public function updateCart()
    {
        $this->load->view('site/carrinho/load_carrinho');
    }
    
    public function finalizar()
    {
        // Não está logado
        if ($this->session->cliente == null) {
            redirect('/carrinho/');
        }
        
        // Verifica quantidade de produtos
        foreach ($this->cart->contents() as $row) {
            $produto = $this->produto_model->findOne(array("id_produto" => $row['id']));
            if ($produto->estoque < $row['qty']) {
                redirect('/carrinho/');
            }
        }
        
        $this->load->model('pedidos_site_model');
        $this->load->model('pedido_produto_model');
        
        // Inserindo pedido
        $pedidoId = $this->pedidos_site_model->insertItem((object) array(
            'total' => $this->cart->total(),
            'id_cliente' => $this->session->cliente->id_cliente,
            'data' => date('Y-m-d H:i:s')
        ));
        
        // Inserindo produtos do pedido
        foreach ($this->cart->contents() as $row) {
            $this->pedido_produto_model->insertItem((object) array(
                'id_pedido' => $pedidoId,
                'id_produto' => $row['id'],
                'quantidade' => $row['qty'],
                'preco' => $row['price']
            ));
        }
        
        $this->session->set_userdata('pedidoId', $pedidoId);
        
        $this->cart->destroy();
        
        redirect('/pedido/finalizado');
    }

}
