@if(!Request::is('login') && !Request::is('register'))
    <!-- NAVBAR -->
<nav class="navbar navbar-default ">
    <!-- TOP BAR -->
    <div class="nav-topbar clearfix">
        <div class="container">
            <div class="left">
                <ul class="list-inline social-icons social-icons-small social-icons-fullrounded">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="right">
                <form class="navbar-form navbar-left search-form" method="post" role="search">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" style="background:#aeaeae">
                        <span class="input-group-btn" >
									<button class="btn btn-default" type="button" style="background:#909090"><i class="fa fa-search" ></i></button>
								</span>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right secondary-navbar-nav user-nav" >
                    <li ><a href="#" >پشتیبانی</a></li>
                    @if (Auth::check())
                        <li class="dropdown "  >
                            <a  href="#" class="dropdown-toggle" data-toggle="dropdown">حساب کاربری <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right drop-down-user">
                                <li class="text-right"><a href="index.html">حساب کاربری</a></li>
                                <li class="text-right"><a href="index.html">پیام های شما</a></li>
                                <li class="text-right"><a href="index.html">سبد خرید</a></li>
                                <li class="text-right"><a href="{{route('logout')}}">خروج</a></li>

                            </ul>
                        </li>
                        @else
                        <li><a href="{{route('login')}}">ورود</a></li>
                    @endif
                    <li><a href="{{route('register')}}" class="as-button"><span class="btn btn-primary">ثبت نام</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END TOP BAR -->




    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-bars"></i>
        </button>
        <a href="index.html" class="navbar-brand">
            <img src="{{asset('images/logo.png')}}" alt="سازمان نشر و چاپ"  height="35" style="padding: 0; margin: 0">
        </a>
        <ul class="nav navbar-nav secondary-navbar-nav">
            <li class="dropdown dropdown-cart">
                <a href="#" class="as-icon disabled dropdown-toggle" data-toggle="dropdown"><i class="icon icon_cart_alt"></i> <span class="cart-count">2</span></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <div class="shopping-cart-widget">
                            <strong>You have <span class="text-primary">2 items</span> in your cart</strong>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="cart-item clearfix">
                                        <a href="#"><img src="assets/img/shop/products/cart-widget-img1.jpg" class="img-responsive" alt="Product Thumbnail"></a>
                                        <div class="info">
                                            <a href="#"><strong class="product-title">Classy Elegant Coat</strong></a>
                                            <span class="product-qty-price text-muted-2x">1 x $135</span>
                                        </div>
                                        <button type="button" class="btn btn-link btn-close"><i class="fa fa-close"></i></button>
                                    </div>
                                </li>
                                <li>
                                    <div class="cart-item clearfix">
                                        <a href="#"><img src="assets/img/shop/products/cart-widget-img2.jpg" alt="Product Thumbnail"></a>
                                        <div class="info">
                                            <a href="#"><strong class="product-title">Casual Wool Coat</strong></a>
                                            <span class="product-qty-price text-muted-2x">1 x $80</span>
                                        </div>
                                        <button type="button" class="btn btn-link btn-close"><i class="fa fa-close"></i></button>
                                    </div>
                                </li>
                            </ul>
                            <div class="cart-footer">
                                <strong class="total">Total: $215</strong>
                                <a href="shop-cart-checkout.html" class="btn btn-primary btn-checkout ">CHECKOUT</a>
                                <div class="clearfix"></div>
                                <p class="continue-shopping"><a href="index-shop.html">Continue shopping</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <div id="main-nav-collapse " class="collapse navbar-collapse">
            <ul class="nav navbar-nav main-navbar-nav ">
                <li><a href="#">ارتباط با ما</a> </li>
                <li><a href="#">درباره ما</a> </li>
                <li><a href="#">اخبار</a> </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">محصولات </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li class="text-right"><a href="shop-product-grid.html">Product Grid</a></li>
                        <li class="text-right"><a href="shop-product-list.html">Product List</a></li>
                        <li class="text-right"><a href="shop-product-single.html">Product Single</a></li>
                        <li class="text-right"><a href="shop-cart-checkout.html">Shopping Cart &amp; Checkout</a></li>
                        <li class="text-right"><a href="shop-thankyou.html">Thank You Page</a></li>
                    </ul>
                </li>
                <li><a href="#">خانه</a> </li>
            </ul>
        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
<!-- END NAVBAR -->
    @endif