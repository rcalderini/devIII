
<div class="content details-page">
    <!---start-product-details--->
    <div class="product-details">
        <div class="wrap">
            <ul class="product-head">
                <li><a href="<?= base_url() ?>">Home</a> <span>::Meu Carrinho</span></li>
                <div class="clear"> </div>
            </ul>

            <div id="table-cart">
                <? $this->load->view("site/carrinho/load_carrinho") ?>
            </div>
        </div>
    </div>
    <!-- End cart -->
</div>

<script>
    function removeItemCarrinho(rowid) {
        $.ajax({
            dataType: "json",
            url: '<?= base_url() ?>/carrinho/remove_item_carrinho/' + rowid,
            data: {
                rowid: rowid
            },
            success: function(data) {
                $('#table-cart').html(data.html);
            }
        });
    }
    
    function atualizarCarrinho(rowid, qtd) {
        var qtdInt = parseInt(qtd, 10);
        if (isNaN(qtdInt)) {
            alert('Quantidade ' + qtd + ' inválida');
        }
        
        $.ajax({
            dataType: "json",
            url: '<?= base_url() ?>/carrinho/update_carrinho/',
            method: 'post',
            data: {
                rowid: rowid,
                qtd: qtd
            },
            success: function(data) {
                $('#table-cart').html(data.html);
            }
        });
    }
</script>