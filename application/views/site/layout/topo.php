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
                    <li><a class="cart" href="#"><span id="clickme"> </span></a></li>
                    <!---start-cart-bag---->
                    <div id="cart">Your Cart is Empty <span>(0)</span></div>
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
                                <a href="/cliente">Painel do Cliente</a>
                            </span>
                            <span class="itemAcessoRapidoMenu">
                                <a href="cliente/logout">Sair</a>
                            </span>
                        </p>
                    </div>
                <? }else{ ?>
                        <ul>
                            <li><a href="/cliente/login">Login</a><span> </span></li>
                            <li><a href="/cliente/cadastrar">Registre-se</a></li>
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
                <a class="logo" href="/"><span> </span></a>
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
            <ul class="megamenu skyblue">
                <li class="grid"><a class="color2" href="#">MEN</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>popular</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">login</a></li>
                                    </ul>
                                </div>
                                <div class="h_nav">
                                    <h4 class="top">man</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="#">accessories</a></li>
                                        <li><a href="#">kids</a></li>
                                        <li><a href="#">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>style zone</h4>
                                    <ul>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>style zone</h4>
                                    <ul>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1 men">
                                <div class="men-pic">
                                    <img src="assets/site/images/men.png" title="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="active grid"><a class="color4" href="#">women</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>shop</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">brands</a></li>
                                    </ul>
                                </div>
                                <div class="h_nav">
                                    <h4>help</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>my company</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="products.html">login</a></li>
                                        <li><a href="products.html">create an account</a></li>
                                        <li><a href="products.html">create wishlist</a></li>
                                        <li><a href="products.html">my shopping bag</a></li>
                                        <li><a href="products.html">brands</a></li>
                                        <li><a href="products.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>my company</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>popular</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1 women">
                                <div class="women-pic">
                                    <img src="assets/site/images/women.png" title="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color5" href="#">KIDS</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>popular</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">login</a></li>
                                    </ul>
                                </div>
                                <div class="h_nav">
                                    <h4 class="top">man</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>style zone</h4>
                                    <ul>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1 kids">
                                <div class="kids-pic">
                                    <img src="assets/site/images/kids1.png" title="" />
                                </div>
                            </div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color6" href="#">SPORTS</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>shop</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">brands</a></li>
                                    </ul>
                                </div>
                                <div class="h_nav">
                                    <h4 class="top">my company</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>man</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>help</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1 sports">
                                <div class="sports-pic">
                                    <img src="assets/site/images/sport.png" title="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color7" href="#">NIKE SPORTSWEAR</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>shop</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">brands</a></li>
                                    </ul>
                                </div>
                                <div class="h_nav">
                                    <h4>my company</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>help</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>my company</h4>
                                    <ul>
                                        <li><a href="products.html">trends</a></li>
                                        <li><a href="products.html">sale</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="products.html">login</a></li>
                                        <li><a href="products.html">create an account</a></li>
                                        <li><a href="products.html">create wishlist</a></li>
                                        <li><a href="products.html">my shopping bag</a></li>
                                        <li><a href="products.html">brands</a></li>
                                        <li><a href="products.html">create wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1 nike">
                                <div class="nike-pic">
                                    <img src="assets/site/images/nike.png" title="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                            <div class="col1"></div>
                        </div>
                    </div>
                </li>
                <li><a class="color8" href="#">NIKEiD</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>style zone</h4>
                                    <ul>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">women</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">brands</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>popular</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">men</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">login</a></li>
                                    </ul>
                                </div>
                                <div class="h_nav">
                                    <h4 class="top">man</h4>
                                    <ul>
                                        <li><a href="products.html">new arrivals</a></li>
                                        <li><a href="products.html">accessories</a></li>
                                        <li><a href="products.html">kids</a></li>
                                        <li><a href="products.html">style videos</a></li>
                                    </ul>
                                </div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                            </div>
                        </div>
                </li>
            </ul>

        </div>
    </div>
</div>
<? $this->load->view('site/layout/messages'); ?>