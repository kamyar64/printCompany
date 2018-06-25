@extends('master.layout')
@section('content')

        <!-- PAGE HEADER DEFAULT -->
        <div class="page-header">
            <div class="container">
                    <ol class="breadcrumb link-accent" >
                        <li><a href="#">ش</a></li>
                        <li><a href="#">شسی</a></li>
                        <li class="active">شسی</li>
                    </ol>

            </div>
        </div>
        <!-- END PAGE HEADER DEFAULT -->
        <!-- PAGE CONTENT -->
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">

                        <!-- PRODUCT DISPLAY -->
                            <ul class="list-inline row product-grid">
                                @foreach($product as $product_data)
                                <li class="col-md-3">
                                    <div class="product-item">
                                        <a href="#">
                                            <img src="{{asset('images/products')}}/{{$product_data->picture}}" class="img-responsive" alt="Product Image"  width="100">
                                            {{--<span class="label label-info">BEST SELLER</span>--}}
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title"><a href="shop-product-single.html">{{$product_data->title}}</a></h3>
                                            <p class="short-description">{{str_limit($product_data->body,100)}}</p>
                                            <div class="bottom">
                                                <span class="price">{{$product_data->cost}}</span>
                                                <a href="#" class="btn btn-primary btn-addtocart"><i class="fa fa-cart-plus"></i> اضافه به سبد خرید</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        <!-- PRODUCT DISPLAY -->
                    </div>
                    <div class="col-md-3 text-right">
                        <!-- FILTER CATEGORY -->
                        <div class="widget widget-filter ">
                            <h4 class="widget-title">محصولات</h4>
                            <ul class="list-unstyled product-attribute-link-list">
                                @foreach($category as $category_data)
                                    <li class="text-right"><a href="#">{{ $category_data->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- END FILTER CATEGORY -->

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