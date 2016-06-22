<table>
    <thead>
        <tr>
            <th class="image">&nbsp;</th>
            <th class="item">Produto</th>
            <th class="qty">Quantidade</th>
            <th class="price">Preço</th>
            <th class="price">Total</th>
            <th class="remove">Remover</th>
        </tr>
    </thead>
    <tbody>
        <?
        if ($this->cart->contents()) {
            foreach ($this->cart->contents() as $row) {
                ?>
                <tr>
                    <td class="image">
                        <div class="product_image">
                            <a href="<?= url_title($row['name'])?>/<?= $row['id']?>" >
                                <img src="assets/site/images/viagem_combo/<?= $row['imagem'] ?>"  alt="<?= $row['name'] ?>" style="width:150; height:100px;"/>
                            </a>
                        </div>
                    </td>
                    <td class="item">
                        <a href="<?= url_title($row['name'])?>/<?= $row['id']?>">
                            <strong><?= $row['name'] ?></strong>
                        </a>
                    </td>
                    <td class="qty">
                        <input type="text" size="4" name="updates[]" id="updates_334709889" value="<?= $row['qty'] ?>" onblur="atualizarCarrinho('<?=$row['rowid']?>', this.value);" class="tc item-quantity" />
                    </td>
                    <!--<td class="cart-price">$100.00</td>-->
                    <td class="price">R$ <?= number_format($row['price'], 2, ',', '.') ?></td>
                    <td class="total"><span><strong>R$ <?= number_format($row['subtotal'], 2, ',', '.') ?></strong></span></td>
                    <td class="remove"><a href="javascript:;" onclick="removeItemCarrinho('<?=$row['rowid']?>');">Remover</a></td>
                </tr>
                <?
            }
        }
        ?>
    </tbody>
</table>
<div class="Grand_Total">
    <p class="total">Valor Total :  <span><strong>R$ <?= number_format($this->cart->total(), 2, ',', '.') ?></strong></span></p>
</div>