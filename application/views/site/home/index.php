<div class="img-slider">
    <div class="wrap">
        <ul id="jquery-demo">
            <li>
                <a href="#slide1">
                    <img src="assets/site/images/slide-1.jpg" alt="" />
                </a>
                <div class="slider-detils">
                    <h3>FUTEBOL MASCULINO <label>CHUTEIRA</label></h3>
                    <span>Mantenha-se fiel à sua equipe durante todos os dia.</span>
                </div>
            </li>
            <li>
                <a href="#slide2">
                    <img src="assets/site/images/slide-4.jpg"  alt="" />
                </a>
                <div class="slider-detils">
                    <h3>FUTEBOL MASCULINO <label>CHUTEIRA</label></h3>
                    <span>Mantenha-se fiel à sua equipe durante todos os dia.</span>
                </div>
            </li>
            <li>
                <a href="#slide3">
                    <img src="assets/site/images/slide-1.jpg" alt="" />
                </a>
                <div class="slider-detils">
                    <h3>FUTEBOL MASCULINO <label>CHUTEIRA</label></h3>
                    <span>Mantenha-se fiel à sua equipe durante todos os dia.</span>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="clear"> </div>
<!----//End-image-slider---->
<!----start-price-rage--->

<!----//End-price-rage--->
<!--- start-content---->
<div class="content">
    <div class="wrap">
        <div class="content">
            <div class="product-grids">
                <!--- start-rate---->
                <script src="assets/site/js/jstarbox.js"></script>
                <link rel="stylesheet" href="assets/site/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
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
                <!---caption-script---->
                <!---//caption-script---->
                <?php $i = 1;
                foreach ($produtos as $produto) {

                    if ($i % 3 == 0) {
                        $i = 1;
                        $class = "last-grid";
                    } else {
                        $class = "";
                    }

                    $i++;

                ?>
                <div onclick="location.href='<?=base_url()?>produto/detalhes/<?=$produto->id_produto?>';" class="product-grid fade <?php echo  $class ?>">
                    <div class="product-grid-head">
                        <ul class="grid-social">
                            <li><a class="facebook" href="#"><span> </span></a></li>
                            <li><a class="twitter" href="#"><span> </span></a></li>
                            <li><a class="googlep" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="block">
                            <div class="starbox small ghosting"> </div> <span> (<?=(rand(0,99))?>)</span>
                        </div>
                    </div>
                    <div class="product-pic">
                        <a href="<?=base_url()?>produto/detalhes/<?=$produto->id_produto?>"><img src="<?=base_url()?>uploads/produtos_fotos/thumb_<?=$produto->imagem?>" title="<?=$produto->produto?>" /></a>
                        <p>
                            <a href="<?=base_url()?>produto/detalhes/<?=$produto->id_produto?>"><small><?=$produto->produto?> </small> - <?=$produto->produto?></a>
                        </p>
                    </div>
                    <div class="product-info">
                        <div class="product-info-cust">
                            <a href="<?=base_url()?>produto/detalhes/<?=$produto->id_produto?>">Detalhes</a>
                        </div>
                        <div class="product-info-price">
                            <a href="<?=base_url()?>produto/detalhes/<?=$produto->id_produto?>">R$ <?php echo number_format($produto->valor, 2, ',', '.'); ?></a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="more-product-info">
                        <span> </span>
                    </div>
                </div>
                <?php } ?>
                <div class="clear"> </div>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>