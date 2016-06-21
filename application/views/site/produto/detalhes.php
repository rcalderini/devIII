<!-- Owl Carousel Assets -->
<link href="<?=base_url()?>assets/site/css/owl.carousel.css" rel="stylesheet">
<script src="<?=base_url()?>assets/site/js/jquery-1.9.1.min.js"></script>
<!-- Owl Carousel Assets -->
<!-- Prettify -->
<script src="<?=base_url()?>assets/site/js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {

        $("#owl-demo").owlCarousel({
            items : 3,
            lazyLoad : true,
            autoPlay : true,
            navigation : true,
            navigationText : ["",""],
            rewindNav : false,
            scrollPerPage : false,
            pagination : false,
            paginationNumbers: false,
        });

    });
</script>
<!-- //Owl Carousel Assets -->
<!--- start-content---->
<div class="content details-page">
    <!---start-product-details--->
    <div class="product-details">
        <div class="wrap">
            <ul class="product-head">
                <li><a href="<?=base_url()?>">Home</a> <span>::</span></li>
                <li class="active-page"><a href="<?=base_url()?>produto/detalhes/<?=$produto->id_produto?>"><?=$produto->produto?></a></li>
                <div class="clear"> </div>
            </ul>
            <!----details-product-slider--->
            <!-- Include the Etalage files -->
            <link rel="stylesheet" href="<?=base_url()?>assets/site/css/etalage.css">
            <script src="<?=base_url()?>assets/site/js/jquery.etalage.min.js"></script>
            <!-- Include the Etalage files -->
            <script>
                jQuery(document).ready(function($){

                    $('#etalage').etalage({
                        thumb_image_width: 300,
                        thumb_image_height: 400,
                        source_image_width: 900,
                        source_image_height: 1000,
                        show_hint: true,
                        click_callback: function(image_anchor, instance_id){
                            alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                        }
                    });
                    // This is for the dropdown list example:
                    $('.dropdownlist').change(function(){
                        etalage_show( $(this).find('option:selected').attr('class') );
                    });

                });
            </script>
            <!----//details-product-slider--->
            <div class="details-left">
                <div class="details-left-slider">
                    <ul id="etalage">
                        <li>
                            <a href="optionallink.html">
                                <img class="etalage_thumb_image" src="<?=base_url()?>assets/site/images/product-slide/image1_thumb.jpg" />
                                <img class="etalage_source_image" src="<?=base_url()?>assets/site/images/product-slide/image1_large.jpg" />
                            </a>
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="<?=base_url()?>assets/site/images/product-slide/image2_thumb.jpg" />
                            <img class="etalage_source_image" src="<?=base_url()?>assets/site/images/product-slide/image2_large.jpg" />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="<?=base_url()?>assets/site/images/product-slide/image3_thumb.jpg" />
                            <img class="etalage_source_image" src="<?=base_url()?>assets/site/images/product-slide/image3_large.jpg" />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="<?=base_url()?>assets/site/images/product-slide/image4_thumb.jpg" />
                            <img class="etalage_source_image" src="<?=base_url()?>assets/site/images/product-slide/image4_large.jpg" />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="<?=base_url()?>assets/site/images/product-slide/image5_thumb.jpg" />
                            <img class="etalage_source_image" src="<?=base_url()?>assets/site/images/product-slide/image5_large.jpg" />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="<?=base_url()?>assets/site/images/product-slide/image6_thumb.jpg" />
                            <img class="etalage_source_image" src="<?=base_url()?>assets/site/images/product-slide/image6_large.jpg" />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="<?=base_url()?>assets/site/images/product-slide/image7_thumb.jpg" />
                            <img class="etalage_source_image" src="<?=base_url()?>assets/site/images/product-slide/image7_large.jpg" />
                        </li>
                    </ul>
                </div>
                <div class="details-left-info">
                    <div class="details-right-head">
                        <h1><?=$produto->produto?></h1>
                        <ul class="pro-rate">
                            <li><a class="product-rate" href="#"> <label> </label></a> <span> </span></li>
                            <li><a href="#">0 Review(s) </a></li>
                        </ul>
                        <div class="product-more-details">
                            <ul class="price-avl">
                                <li class="price"><span>R$ <?php echo number_format($produto->valor, 2, ',', '.'); ?></span><label>R$ <?php echo number_format(($produto->valor - ($produto->valor * 0.10)), 2, ',', '.'); ?></label></li>
                                <li class="stock"><i>Em estoque</i></li>
                                <div class="clear"> </div>
                            </ul>
                            <ul class="prosuct-qty">
                                <span>Quantidade:</span>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </ul>
                            <input type="button" value="adicionar ao carrinho" />
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
        </div>
        <!----product-rewies---->
        <div class="product-reviwes">
            <div class="wrap">
                <!--vertical Tabs-script-->
                <!---responsive-tabs---->
                <script src="<?=base_url()?>assets/site/js/easyResponsiveTabs.js" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#horizontalTab').easyResponsiveTabs({
                            type: 'default', //Types: default, vertical, accordion
                            width: 'auto', //auto or any width like 600px
                            fit: true,   // 100% fit in a container
                            closed: 'accordion', // Start closed if in accordion view
                            activate: function(event) { // Callback function if tab is switched
                                var $tab = $(this);
                                var $info = $('#tabInfo');
                                var $name = $('span', $info);
                                $name.text($tab.text());
                                $info.show();
                            }
                        });

                        $('#verticalTab').easyResponsiveTabs({
                            type: 'vertical',
                            width: 'auto',
                            fit: true
                        });
                    });
                </script>
                <!---//responsive-tabs---->
                <!--//vertical Tabs-script-->
                <!--vertical Tabs-->
                <div id="verticalTab">
                    <ul class="resp-tabs-list">
                        <li>Descrição</li>
                        <li>Review Produtos</li>
                    </ul>
                    <div class="resp-tabs-container vertical-tabs">
                        <div>
                            <h3> Details</h3>
                            <?=$produto->detalhe?>
                        </div>
                        <div>
                            <h3>Review Personalizado</h3>
                            <p>Não foram realizadas reviews deste produto até o momento.</p>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
                <!--- start-similar-products--->
                <div class="similar-products">
                    <div class="similar-products-left">
                        <h3>Outros Produtos Simulares</h3>
                        <p>A seguir são apresentados alguns produtos que julgamos serem do seu interesse.</p>
                    </div>
                    <div class="similar-products-right">
                        <!-- start content_slider -->
                        <!--- start-rate---->
                        <script src="<?=base_url()?>assets/site/js/jstarbox.js"></script>
                        <link rel="stylesheet" href="<?=base_url()?>assets/site/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
                        <script type="text/javascript">
                            jQuery(function() {
                                jQuery('.starbox').each(function() {
                                    var starbox = jQuery(this);
                                    starbox.starbox({
                                        average: starbox.attr('data-start-value'),
                                        changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                                        ghosting: starbox.hasClass('ghosting'),
                                        autoUpdateAverage: starbox.hasClass('autoupdate'),
                                        buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                                        stars: starbox.attr('data-star-count') || 5
                                    }).bind('starbox-value-changed', function(event, value) {
                                        if(starbox.hasClass('random')) {
                                            var val = Math.random();
                                            starbox.next().text(' '+val);
                                            return val;
                                        }
                                    })
                                });
                            });
                        </script>
                        <!---//End-rate---->
                        <div id="owl-demo" class="owl-carousel">
                            <? foreach($outros_produtos as $prod) { ?>
                            <div class="item" onclick="location.href='<?=base_url()?>produto/detalhes/<?=$prod->id_produto?>';" >
                                <div class="product-grid fade sproduct-grid">
                                    <div class="product-pic">
                                        <a href="<?=base_url()?>produto/detalhes/<?=$prod->id_produto?>"><img src="<?=base_url()?>uploads/produtos_fotos/thumb_<?=$prod->imagem?>" title="<?=$prod->produto?>" /></a>
                                        <p>
                                            <a href="<?=base_url()?>produto/detalhes/<?=$prod->id_produto?>"><small><?=$prod->produto?></small> </a>
                                            <span> - </span>
                                        </p>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-info-cust">
                                            <a href="<?=base_url()?>produto/detalhes/<?=$prod->id_produto?>">Detalhes</a>
                                        </div>
                                        <div class="product-info-price">
                                            <a href="<?=base_url()?>produto/detalhes/<?=$prod->id_produto?>">R$ <?php echo number_format($prod->valor, 2, ',', '.'); ?></a>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>
                                    <div class="more-product-info">
                                        <span> </span>
                                    </div>
                                </div>
                            </div>
                            <? } ?>

                        </div>
                        <!----//End-img-cursual---->
                    </div>
                    <div class="clear"> </div>
                </div>
                <!--- //End-similar-products--->
            </div>
        </div>
        <div class="clear"> </div>
        <!--//vertical Tabs-->
        <!----//product-rewies---->
        <!---//End-product-details--->
    </div>
</div>
<!--- //End-content---->
