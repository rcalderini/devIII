<div class="header">
    <div class="top-header">
        <div class="wrap">
            <div class="top-header-left">
                <ul>
                    <!---cart-tonggle-script---->
                    <script type="text/javascript">
                        $(function(){
                            var $cart = $('#cart');
                            $('#clickme').click(function(e) {
                                e.stopPropagation();
                                if ($cart.is(":hidden")) {
                                    $cart.slideDown("slow");
                                } else {
                                    $cart.slideUp("slow");
                                }
                            });
                            $(document.body).click(function () {
                                if ($cart.not(":hidden")) {
                                    $cart.slideUp("slow");
                                }
                            });
                        });
                    </script>
                    <!---//cart-tonggle-script---->
                    <li><a class="cart" href="<?=base_url()?>carrinho"><span id="clickme"> </span></a></li>
                    <!---start-cart-bag---->
                    <!-- <div id="cart">Your Cart is Empty <span>(0)</span></div> -->
                    <!---start-cart-bag---->
                    <li><a class="info" href="#"><span> </span></a></li>
                </ul>
            </div>
            <div class="top-header-center">
                <div class="top-header-center-alert-left">
                    <h3>ENTREGA GRÁTIS</h3>
                </div>
                <div class="top-header-center-alert-right">
                    <div class="vticker">
                        <ul>
                            <li>Toda loja com frete grátis. <label>Aproveite as ofertas!</label></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="top-header-right">
                <? if ($this->session->cliente != null) { ?>
                    <div class="msgClienteLogado">
                        <p>Olá, <?echo $this->session->cliente->nome ?>.</p>
                        <p class="acessoRapidoMenuCliente">
                            <span class="itemAcessoRapidoMenu">
                                <a href="<?=base_url()?>cliente">Painel do Cliente</a>
                            </span>
                            <span class="itemAcessoRapidoMenu">
                                <a href="<?=base_url()?>cliente/logout">Sair</a>
                            </span>
                        </p>
                    </div>
                <? }else{ ?>
                        <ul>
                            <li><a href="<?=base_url()?>cliente/login">Login</a><span> </span></li>
                            <li><a href="<?=base_url()?>cliente/cadastrar">Registre-se</a></li>
                        </ul><?
                    }
                ?>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <!----start-mid-head---->
    <div class="mid-header">
        <div class="wrap">
            <div class="mid-grid-left">
                <a class="logo" href="<?=base_url()?>"><span> </span></a>
            </div>
            <div class="mid-grid-right">
                <form>
                    <input type="text" placeholder="Está procurando o que?" />
                </form>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <!----//End-mid-head---->
    <!----start-bottom-header---->
    <div class="header-bottom">
        <div class="wrap">
            <!-- start header menu -->
        </div>
    </div>
</div>
<? $this->load->view('site/layout/messages'); ?>