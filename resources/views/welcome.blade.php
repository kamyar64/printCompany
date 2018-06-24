@extends('master.layout')
@section('content')

        <!-- PAGE HEADER DEFAULT -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title pull-left">PRODUCT GRID</h1>
                <ol class="breadcrumb link-accent">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li class="active">Product Grid</li>
                </ol>
            </div>
        </div>
        <!-- END PAGE HEADER DEFAULT -->
        <!-- PAGE CONTENT -->
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <!-- BANNER CAROUSEL -->
                        <div id="carousel-banner" class="owl-carousel carousel-pagination-inside">
                            <div>
                                <a href="#"><img src="assets/img/shop/banner1.jpg" class="img-responsive" alt="Banner 1"></a>
                            </div>
                            <div>
                                <a href="#"><img src="assets/img/shop/banner2.jpg" class="img-responsive" alt="Banner 2"></a>
                            </div>
                        </div>
                        <!-- END BANNER CAROUSEL -->
                        <!-- PRODUCT DISPLAY -->
                        <div class="product-display">
                            <!-- DISPLAY CONTROLS -->
                            <div class="display-controls clearfix">
                                <div class="controls-left">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label>Sort by:</label>
                                            <select class="form-control">
                                                <option value="relevancy">Relevancy</option>
                                                <option value="popularity">Popularity</option>
                                                <option value="rating">Rating</option>
                                                <option value="price-lowest">Price Lowest</option>
                                                <option value="price-highest">Price Highest</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Show:</label>
                                            <select class="form-control">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>View:</label>
                                            <label class="radio-icon" title="Grid View">
                                                <input type="radio" name="view-mode" checked="checked" title="Grid View"><span><i class="fa fa-th"></i></span>
                                            </label>
                                            <label class="radio-icon" title="List View">
                                                <input type="radio" name="view-mode" title="List View"><span><i class="fa fa-list"></i></span>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="controls-right">
                                    <ul class="pagination borderless">
                                        <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END DISPLAY CONTROLS -->
                            <!-- PRODUCT GRID -->
                            <ul class="list-inline row product-grid">
                                <li class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <a href="shop-product-single.html">
                                            <img src="assets/img/shop/products/product2.png" class="img-responsive" alt="Product Image">
                                            <span class="label label-info">BEST SELLER</span>
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title"><a href="shop-product-single.html">Trendy Outfit</a></h3>
                                            <p class="short-description">Objectively monetize web-enabled expertise whereas enabled growth successful strategies.</p>
                                            <div class="bottom">
                                                <span class="price">$34</span>
                                                <a href="#" class="btn btn-primary btn-addtocart"><i class="fa fa-cart-plus"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <a href="shop-product-single.html">
                                            <img src="assets/img/shop/products/product3.png" class="img-responsive" alt="Product Image">
                                            <span class="label label-discount">50% OFF</span>
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title"><a href="shop-product-single.html">Casual Blazer</a></h3>
                                            <p class="short-description">Objectively monetize web-enabled expertise whereas enabled growth successful strategies.</p>
                                            <div class="bottom">
                                                <span class="price-old"><s>$100</s></span> <span class="price">$50</span>
                                                <a href="#" class="btn btn-primary btn-addtocart"><i class="fa fa-cart-plus"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <a href="shop-product-single.html">
                                            <img src="assets/img/shop/products/product4.png" class="img-responsive" alt="Product Image">
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title"><a href="shop-product-single.html">Wool Jacket</a></h3>
                                            <p class="short-description">Objectively monetize web-enabled expertise whereas enabled growth successful strategies.</p>
                                            <div class="bottom">
                                                <span class="price">$34</span>
                                                <a href="#" class="btn btn-primary btn-addtocart"><i class="fa fa-cart-plus"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <a href="shop-product-single.html">
                                            <img src="assets/img/shop/products/product6.png" class="img-responsive" alt="Product Image">
                                            <span class="label label-discount">25% OFF</span>
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title"><a href="shop-product-single.html">Formal Men Suit</a></h3>
                                            <p class="short-description">Objectively monetize web-enabled expertise whereas enabled growth successful strategies.</p>
                                            <div class="bottom">
                                                <span class="price-old"><s>$200</s></span> <span class="price">$150</span>
                                                <a href="#" class="btn btn-primary btn-addtocart"><i class="fa fa-cart-plus"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <a href="shop-product-single.html">
                                            <img src="assets/img/shop/products/product7.png" class="img-responsive" alt="Product Image">
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title"><a href="shop-product-single.html">Men Adventure Outfit</a></h3>
                                            <p class="short-description">Objectively monetize web-enabled expertise whereas enabled growth successful strategies.</p>
                                            <div class="bottom">
                                                <span class="price">$34</span>
                                                <a href="#" class="btn btn-primary btn-addtocart"><i class="fa fa-cart-plus"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <a href="shop-product-single.html">
                                            <img src="assets/img/shop/products/product8.png" class="img-responsive" alt="Product Image">
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title"><a href="shop-product-single.html">Sweater</a></h3>
                                            <p class="short-description">Objectively monetize web-enabled expertise whereas enabled growth successful strategies.</p>
                                            <div class="bottom">
                                                <span class="price">$34</span>
                                                <a href="#" class="btn btn-primary btn-addtocart"><i class="fa fa-cart-plus"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- END PRODUCT GRID -->
                        </div>
                        <!-- PRODUCT DISPLAY -->
                    </div>
                    <div class="col-md-3 text-right">
                        <!-- FILTER CATEGORY -->
                        <div class="widget widget-filter ">
                            <h4 class="widget-title">FILTER BY CATEGORY</h4>
                            <ul class="list-unstyled product-attribute-link-list">
                                <li>
                                    <a href="#">Women</a> <span>(44)</span>
                                    <ul class="list-unstyled product-subcategory-list">
                                        <li>- <a href="#">Dress</a> <span>(30)</span></li>
                                        <li>- <a href="#">Shoes</a> <span>(14)</span></li>
                                    </ul>
                                </li>
                                <li><a href="#">Men</a> <span>(35)</span></li>
                                <li><a href="#">Kids</a> <span>(26)</span></li>
                                <li><a href="#">Accessories</a> <span>(67)</span></li>
                                <li class="active"><a href="#">Best Deal</a> <span>(78)</span></li>
                            </ul>
                        </div>
                        <!-- END FILTER CATEGORY -->
                        <!-- FILTER BRAND -->
                        <div class="widget widget-filter">
                            <h4 class="widget-title">FILTER BY BRAND</h4>
                            <ul class="list-unstyled product-attribute-link-list">
                                <li class="active"><a href="#">JFashion</a> <span>(23)</span></li>
                                <li><a href="#">ABC</a> <span>(45)</span></li>
                                <li><a href="#">KidsOnly</a> <span>(18)</span></li>
                                <li><a href="#">AllBeauty</a> <span>(75)</span></li>
                            </ul>
                        </div>
                        <!-- END FILTER BRAND -->
                        <!-- FILTER PRICE -->
                        <div class="widget widget-filter filter-price">
                            <h4 class="widget-title">FILTER BY PRICE</h4>
                            <input type="text" class="input-range" name="price-range" value="">
                            <input type="number" class="form-control input-price" id="price-from" placeholder="From"> -
                            <input type="number" class="form-control input-price" id="price-to" placeholder="To">
                        </div>
                        <!-- END FILTER PRICE -->
                        <!-- FILTER SIZE -->
                        <div class="widget widget-filter">
                            <h4 class="widget-title">FILTER BY SIZE</h4>
                            <ul class="list-inline product-size-list">
                                <li><a href="#">XS</a></li>
                                <li class="active"><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                            </ul>
                        </div>
                        <!-- END FILTER SIZE -->
                        <!-- FILTER COLOR -->
                        <div class="widget widget-filter">
                            <h4 class="widget-title">FILTER BY COLOR</h4>
                            <ul class="list-inline product-color-list">
                                <li>
                                    <a href="#" style="background-color: #F5A623;"></a>
                                </li>
                                <li class="active">
                                    <a href="#" style="background-color: #D0021B;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #D0021B;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #BD10E0;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #417505;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #50E3C2;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #8B572A;"></a>
                                </li>
                                <li class="active">
                                    <a href="#" style="background-color: #71787B;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #4F95AF;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #94B79C;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #1A1A1A;"></a>
                                </li>
                                <li class="active">
                                    <a href="#" style="background-color: #CBCBCB;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #C73B3B;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #B5C73B;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #FFF200;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #1BD023;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #323A93;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #933232;"></a>
                                </li>
                                <li>
                                    <a href="#" style="background-color: #329364;"></a>
                                </li>
                            </ul>
                        </div>
                        <!-- END FILTER COLOR -->
                    </div>

                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->
        <!-- FOOTER -->
        <footer>
            <div class="container">
                <div class="row text-right">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="footer-heading footer-heading-simple">NEWSLETTER</h4>
                                <p>Get the latest update from us by subscribing to our newsletter.</p>
                                <form class="newsletter-form" method="post">
                                    <div class="input-group input-group-lg">
                                        <input type="email" class="form-control" name="email" placeholder="youremail@domain.com">
                                        <span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-spinner fa-spin"></i><span>SUBSCRIBE</span></button>
										</span>
                                    </div>
                                    <div class="alert"></div>
                                </form>
                                <h4 class="footer-heading footer-heading-simple">WE ACCEPT</h4>
                                <ul class="list-inline list-image-icons">
                                    <li><img src="assets/img/shop/payments/visa-dark.png" alt="Visa"></li>
                                    <li><img src="assets/img/shop/payments/maestro-dark.png" alt="Maestro"></li>
                                    <li><img src="assets/img/shop/payments/mastercard-dark.png" alt="MasterCard"></li>
                                    <li><img src="assets/img/shop/payments/discover-dark.png" alt="Discover"></li>
                                    <li><img src="assets/img/shop/payments/paypal-dark.png" alt="PayPal"></li>
                                    <li><img src="assets/img/shop/payments/stripe-dark.png" alt="Stripe"></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4 class="footer-heading footer-heading-simple">CONTACT US</h4>
                                <address>
                                    <i class="icon icon_phone ico-styled text-primary"></i>
                                    <abbr title="Phone">P:</abbr> (1800) 765 - 4321, (1800) 765 - 4322
                                    <br>
                                    <br>
                                    <i class="icon icon_mail_alt ico-styled text-primary"></i> <a href="mailto:email@yourdomain.com">email@yourdomain.com</a>
                                </address>
                                <ul class="list-inline social-icons social-icons-small social-icons-bordered">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="footer-heading footer-heading-simple">GENERAL</h4>
                                <ul class="list-unstyled link-list">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Who we are</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="footer-heading footer-heading-simple">BUYING GUIDES</h4>
                                <ul class="list-unstyled link-list">
                                    <li><a href="#">How to buy</a></li>
                                    <li><a href="#">Product Guide</a></li>
                                    <li><a href="#">License</a></li>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <p class="copyright-text text-center margin-top-30 no-margin-bottom">&copy;2016 The Develovers. All Rights Reserved.</p>
        </footer>
        <!-- END FOOTER -->
        <div class="back-to-top">
            <a href="#top"><i class="fa fa-chevron-up"></i></a>
        </div>
@endsection