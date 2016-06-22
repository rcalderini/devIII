<div class="content">
    <div class="wrap">
        <ul class="product-head">
            <li><a href="<?= base_url() ?>">Home</a> :: <a href="<?= base_url() ?>cliente">Painel do Cliente</a> :: <span>Meus Pedidos </span></li>
            <div class="clear"> </div>
        </ul>
        <div id="table-cart">
            <?if (count($pedidos) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Número Pedido</th>
                            <th>Data</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?foreach ($pedidos as $pedido) {?>
                            <tr>
                                <td align="center">
                                    <?echo $pedido->id_pedido ?>
                                </td>
                                <td align="center">
                                    <?echo $pedido->data_pedido ?>
                                </td>
                                <td align="center">
                                    R$<?echo number_format($pedido->total, 2, ',', '.') ?>
                                </td>
                            </tr>
                        <?}?>
                    </tbody>
                </table>
            <?} else { ?>
                <p class="mensagem">Nenhum Pedidos Encontrado!</p> <?
            }?>
        </div>
    </div>
</div>