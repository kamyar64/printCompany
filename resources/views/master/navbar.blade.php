
@if(!Request::is('login') && !Request::is('register'))
    <!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
    <!-- TOP BAR -->
    <div class="nav-topbar clearfix">
        <div class="container">
            <div class="left">
                <ul class="list-inline social-icons social-icons-small social-icons-fullrounded">
                    @foreach($socialNetwork as $social)
                    <li><a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a></li>
                    @endforeach
                </ul>
            </div>
            <div class="right">

                <ul class="nav navbar-nav navbar-right secondary-navbar-nav user-nav" >
                    <li><a href="{{route('register')}}" class="as-button"><span class="btn btn-primary">ثبت نام</span></a></li>


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
                    <li ><a href="#" >پشتیبانی</a></li>
                    <form class="navbar-form navbar-left search-form" method="post" role="search">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" style="background:#aeaeae">
                            <span class="input-group-btn" >
									<button class="btn btn-default" type="button" style="background:#909090"><i class="fa fa-search" ></i></button>
								</span>
                        </div>
                    </form>
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
        <a href="{{ route('home') }}" class="navbar-brand pull-left">
            <img src="{{asset('images/logo.png')}}" alt="سازمان نشر و چاپ"  height="40" >
        </a>
        <ul class="nav navbar-nav secondary-navbar-nav">
            <li class="dropdown dropdown-cart">
                <a href="#" class="as-icon disabled dropdown-toggle" data-toggle="dropdown"><i class="icon icon_cart_alt"></i>   @if(count(Cart::content()) >0)<span class="cart-count">{{count(Cart::content())}}</span>@endif</a>
                <ul class="dropdown-menu dropdown-menu-left">
                    <li>
                        <div class="shopping-cart-widget">
                            @if(count(Cart::content()) >0)
                            <strong>شما <span class="text-primary">{{ Helper::convertToPersianDigit(count(Cart::content())) }}</span> کالا در سبد خرید دارید</strong>
                            @else
                                <strong>سبد خرید شما خالیست</strong>
                                @endif
                            <ul class="list-unstyled">
                                @php $varkol=0 @endphp
                                @foreach(Cart::content() as $row)
                                    @php
                                    $varkol+=( $row->qty*$row->price );
                                    @endphp
                                <li>
                                    <div class="cart-item clearfix">
                                        <div class="info">
                                            <a href="#"><strong class="product-title">{{ $row->name }}</strong></a>
                                            <span class="product-qty-price text-muted-2x">{{ Helper::convertToPersianDigit($row->qty) }} * {{Helper::convertToPersianDigit(number_format($row->price))}} {{ $row->options->price_unit }}</span>
                                        </div>
                                        <button type="button" class="btn btn-link btn-close btn-remove-cart " data-id="{{$row->rowId }}"><i class="fa fa-close"></i></button>
                                    </div>
                                </li>
                                    @endforeach
                            </ul>
                            <div class="cart-footer">
                                <strong class="total">جمع مبلغ : {{Helper::convertToPersianDigit(number_format($varkol))}}</strong>
                                <a href="{{route('basket_address')}}" class="btn btn-primary btn-checkout ">ادامه خرید</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <div id="main-nav-collapse " class="collapse navbar-collapse">
            <ul class="nav navbar-nav main-navbar-nav ">
                <li><a href="{{route('home')}}">خانه</a> </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">محصولات </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        @foreach($category as $category_data)
                        <li class="text-right"><a href="{{route('products',['slug'=>$category_data["slug"]])}}">{{ $category_data->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @php
                    function limit($array){
                        foreach ($array as $arrData){

                        if($arrData["children"] !=null){
                         echo '<li class="dropdown  text-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$arrData["name"].'</a>';
                        echo '<ul class="dropdown-menu dropdown-menu-right" role="menu">';
                         limit($arrData["children"]);
                         echo "</ul>";
                         echo "</li>";
                        }
                        else{
                          echo  '<li class="text-right"><a href="#">'.$arrData["name"].'</a> </li>';
                        }

                        }
                    }
                limit($menu);
                @endphp
                <li><a href="#">اخبار</a> </li>
                <li><a href="{{route('contact_us')}}">ارتباط با ما</a> </li>
                <li><a href="#">درباره ما</a> </li>
            </ul>
        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
<!-- END NAVBAR -->
    @endif