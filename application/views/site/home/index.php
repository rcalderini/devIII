<div class="img-slider">
    <div class="wrap">
        <ul id="jquery-demo">
            <li>
                <a href="#slide1">
                    <img src="assets/site/images/slide-1.jpg" alt="" />
                </a>
                <div class="slider-detils">
                    <h3>MENS FOOT BALL <label>BOOTS</label></h3>
                    <span>Stay true to your team all day, every day, game day.</span>
                    <a class="slide-btn" href="details.html"> Shop Now</a>
                </div>
            </li>
            <li>
                <a href="#slide2">
                    <img src="assets/site/images/slide-4.jpg"  alt="" />
                </a>
                <div class="slider-detils">
                    <h3>MENS FOOT BALL <label>BOOTS</label></h3>
                    <span>Stay true to your team all day, every day, game day.</span>
                    <a class="slide-btn" href="details.html"> Shop Now</a>
                </div>
            </li>
            <li>
                <a href="#slide3">
                    <img src="assets/site/images/slide-1.jpg" alt="" />
                </a>
                <div class="slider-detils">
                    <h3>MENS FOOT BALL <label>BOOTS</label></h3>
                    <span>Stay true to your team all day, every day, game day.</span>
                    <a class="slide-btn" href="details.html"> Shop Now</a>
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
                <div onclick="location.href='details.html';" class="product-grid fade">
                    <div class="product-grid-head">
                        <ul class="grid-social">
                            <li><a class="facebook" href="#"><span> </span></a></li>
                            <li><a class="twitter" href="#"><span> </span></a></li>
                            <li><a class="googlep" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="block">
                            <div class="starbox small ghosting"> </div> <span> (46)</span>
                        </div>
                    </div>
                    <div class="product-pic">
                        <a href="#"><img src="assets/site/images/product2.jpg" title="product-name" /></a>
                        <p>
                            <a href="#"><small>Nike</small> HYPERVENOM <small>Phantom</small> FG</a>
                            <span>Men's Firm-Ground Football Boot</span>
                        </p>
                    </div>
                    <div class="product-info">
                        <div class="product-info-cust">
                            <a href="details.html">Details</a>
                        </div>
                        <div class="product-info-price">
                            <a href="details.html">&#163; 380</a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="more-product-info">
                        <span> </span>
                    </div>
                </div>
                <div onclick="location.href='details.html';"  class="product-grid fade">
                    <div class="product-grid-head">
                        <ul class="grid-social">
                            <li><a class="facebook" href="#"><span> </span></a></li>
                            <li><a class="twitter" href="#"><span> </span></a></li>
                            <li><a class="googlep" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="block">
                            <div class="starbox small ghosting"> </div> <span> (46)</span>
                        </div>
                    </div>
                    <div class="product-pic">
                        <a href="#"><img src="assets/site/images/product1.jpg" title="product-name" /></a>
                        <p>
                            <a href="#"><small>Nike</small> HYPERVENOM <small>Phantom</small> FG</a>
                            <span>Men's Firm-Ground Football Boot</span>
                        </p>
                    </div>
                    <div class="product-info">
                        <div class="product-info-cust">
                            <a href="details.html">Details</a>
                        </div>
                        <div class="product-info-price">
                            <a href="details.html">&#163; 375</a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="more-product-info">
                        <span> </span>
                    </div>
                </div>
                <div onclick="location.href='details.html';"  class="product-grid fade last-grid">
                    <div class="product-grid-head">
                        <ul class="grid-social">
                            <li><a class="facebook" href="#"><span> </span></a></li>
                            <li><a class="twitter" href="#"><span> </span></a></li>
                            <li><a class="googlep" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="block">
                            <div class="starbox small ghosting"> </div> <span> (46)</span>
                        </div>
                    </div>
                    <div class="product-pic">
                        <a href="#"><img src="assets/site/images/product3.jpg" title="product-name" /></a>
                        <p>
                            <a href="#"><small>Nike</small> HYPERVENOM <small>Phantom</small> FG</a>
                            <span>Men's Firm-Ground Football Boot</span>
                        </p>
                    </div>
                    <div class="product-info">
                        <div class="product-info-cust">
                            <a href="details.html">Details</a>
                        </div>
                        <div class="product-info-price">
                            <a href="details.html">&#163; 350</a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="more-product-info">
                        <span> </span>
                    </div>
                </div>
                <div onclick="location.href='details.html';"  class="product-grid fade">
                    <div class="product-grid-head">
                        <ul class="grid-social">
                            <li><a class="facebook" href="#"><span> </span></a></li>
                            <li><a class="twitter" href="#"><span> </span></a></li>
                            <li><a class="googlep" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="block">
                            <div class="starbox small ghosting"> </div> <span> (46)</span>
                        </div>
                    </div>
                    <div class="product-pic">
                        <a href="#"><img src="assets/site/images/product4.jpg" title="product-name" /></a>
                        <p>
                            <a href="#"><small>Nike</small> HYPERVENOM <small>Phantom</small> FG</a>
                            <span>Men's Firm-Ground Football Boot</span>
                        </p>
                    </div>
                    <div class="product-info">
                        <div class="product-info-cust">
                            <a href="details.html">Details</a>
                        </div>
                        <div class="product-info-price">
                            <a href="details.html">&#163; 370</a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="more-product-info">
                        <span> </span>
                    </div>
                </div>
                <div onclick="location.href='details.html';"  class="product-grid fade">
                    <div class="product-grid-head">
                        <ul class="grid-social">
                            <li><a class="facebook" href="#"><span> </span></a></li>
                            <li><a class="twitter" href="#"><span> </span></a></li>
                            <li><a class="googlep" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="block">
                            <div class="starbox small ghosting"> </div> <span> (46)</span>
                        </div>
                    </div>
                    <div class="product-pic">
                        <a href="#"><img src="assets/site/images/product5.jpg" title="product-name" /></a>
                        <p>
                            <a href="#"><small>Nike</small> HYPERVENOM <small>Phantom</small> FG</a>
                            <span>Men's Firm-Ground Football Boot</span>
                        </p>
                    </div>
                    <div class="product-info">
                        <div class="product-info-cust">
                            <a href="details.html">Details</a>
                        </div>
                        <div class="product-info-price">
                            <a href="details.html">&#163; 355</a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="more-product-info">
                        <span> </span>
                    </div>
                </div>
                <div onclick="location.href='details.html';"  class="product-grid fade last-grid">
                    <div class="product-grid-head">
                        <ul class="grid-social">
                            <li><a class="facebook" href="#"><span> </span></a></li>
                            <li><a class="twitter" href="#"><span> </span></a></li>
                            <li><a class="googlep" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="block">
                            <div class="starbox small ghosting"> </div> <span> (46)</span>
                        </div>
                    </div>
                    <div class="product-pic">
                        <a href="#"><img src="assets/site/images/product6.jpg" title="product-name" /></a>
                        <p>
                            <a href="#"><small>Nike</small> HYPERVENOM <small>Phantom</small> FG</a>
                            <span>Men's Firm-Ground Football Boot</span>
                        </p>
                    </div>
                    <div class="product-info">
                        <div class="product-info-cust">
                            <a href="details.html">Details</a>
                        </div>
                        <div class="product-info-price">
                            <a href="details.html">&#163; 390</a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="more-product-info">
                        <span> </span>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>