<?php
    if ($this->cart->contents() == false) {
?>
<p>Carrinho vazio</p>
<a class="btn-default" style="margin-top: 15px; float: left" href="<?= base_url() ?>">Escolher produtos</a>
<?php
    } else {
?>

<table>
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Total</th>
            <th>Remover</th>
        </tr>
    </thead>
    <tbody>
        <?
        if ($this->cart->contents()) {
            foreach ($this->cart->contents() as $row) {
                $produto = $this->produto_model->findOne(array("id_produto" => $row['id']));
                ?>
                <tr>
                    <td>
                        <div class="product_image">
                            <a href="<?= base_url() ?>produto/detalhes/<?= $row['id'] ?>" >
                                <img src="<?= base_url() ?>uploads/produtos_fotos/thumb_<?= $row['imagem'] ?>"  alt="<?= $row['name'] ?>" style="width:150;"/>
                            </a>
                        </div>
                    </td>
                    <td>
                        <a href="<?= base_url() ?>produto/detalhes/<?= $row['id'] ?>">
                            <strong><?= $row['name'] ?></strong>
                        </a>
                    </td>
                    <td width="20%">
                        <input type="text" size="3" name="updateqty" value="<?= $row['qty'] ?>" onblur="atualizarCarrinho('<?= $row['rowid'] ?>', this.value);" class="tc item-quantity" />
                        <?php
                            if ($produto->estoque < $row['qty']) {
                        ?>
                        <br />
                        <span style="color:red">Só existem <?=$produto->estoque?> unidade(s) no estoque, por favor altere a quantidade para finalizar o pedido</span>
                        <?php
                            }
                        ?>
                    </td>
                    <!--<td class="cart-price">$100.00</td>-->
                    <td>R$ <?= number_format($row['price'], 2, ',', '.') ?></td>
                    <td><span><strong>R$ <?= number_format($row['subtotal'], 2, ',', '.') ?></strong></span></td>
                    <td><a href="javascript:;" onclick="removeItemCarrinho('<?= $row['rowid'] ?>');">Remover</a></td>
                </tr>
                <?
            }
        }
        ?>
    </tbody>
</table>

<a class="btn-default" style="margin-top: 15px; float: left" href="<?= base_url() ?>">Escolher mais produtos</a>

<div class="Grand_Total">
    <p class="total">Valor Total :  <span><strong>R$ <?= number_format($this->cart->total(), 2, ',', '.') ?></strong></span></p>
</div>

<div class="clearfix" style="float: right; margin-top: 15px">
    <?php if ($this->session->cliente) { ?>
    <a class="btn-red" href="<?= base_url() ?>carrinho/finalizar">Finalizar</a>
    <?php } else { ?>
    <span style="color: red">Você precisa estar logado para continuar.</span><br />
    <a class="btn-red" style="float: right" href="<?= base_url() ?>cliente/login">Logar</a>
    <?php } ?>
    <!--<input type="submit" id="update-cart" class="btn" name="update" value="Atualizar" />-->
</div>

<div class="clearfix"></div>
<?php 
    }
?>