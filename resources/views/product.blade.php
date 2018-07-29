@extends('master.layout')
@section('content')
    <!-- BREADCRUMBS -->
    <div class="page-header ">
        <div class="container">
            <ol class="breadcrumb link-accent">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li><a href="{{ route('products') }}">محصولات</a></li>
                <li class="active">{{$product->title}}</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content product-single">
        <div class="container">
            <!-- SINGLE PRODUCT -->
            <section>
                <!-- TOP MAIN -->
                <div class="row top">
                    <div class="col-sm-4">
                        <div class="product-single-image">
                            <img src="{{asset("images/products")}}/{{ $product->picture }}" style="width: 250px" class="img-responsive" alt="Product Image">
                           {{-- <span class="icon-zoom"><i class="fa fa-search-plus"></i> بزرگ نمایی</span>--}}
                        </div>
                      {{--  <div id="product-thumnails" class="owl-carousel carousel-product-thumbnails" dir="ltr">
                            <div>
                                <a href="{{asset("assets/img/shop/products/single/single-product-img1.jpg")}}"><img src="{{asset("assets/img/shop/products/single/thumbnails/single-product-img1-thumb.jpg")}}" class="img-responsive" alt="Image"></a>
                            </div>
                            <div>
                                <a href="{{asset("assets/img/shop/products/single/single-product-img2.jpg")}}"><img src="{{asset("assets/img/shop/products/single/thumbnails/single-product-img2-thumb.jpg")}}" class="img-responsive" alt="Image"></a>
                            </div>
                            <div>
                                <a href="{{asset("assets/img/shop/products/single/single-product-img3.jpg")}}"><img src="{{asset("assets/img/shop/products/single/thumbnails/single-product-img3-thumb.jpg")}}" class="img-responsive" alt="Image"></a>
                            </div>
                            <div>
                                <a href="{{asset("assets/img/shop/products/single/single-product-img4.jpg")}}"><img src="{{asset("assets/img/shop/products/single/thumbnails/single-product-img4-thumb.jpg")}}" class="img-responsive" alt="Image"></a>
                            </div>
                            <div>
                                <a href="{{asset("assets/img/shop/products/single/single-product-img5.jpg")}}"><img src="{{asset("assets/img/shop/products/single/thumbnails/single-product-img5-thumb.jpg")}}" class="img-responsive" alt="Image"></a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="col-sm-8">
                        <h1 class="product-title">{{ $product->title }}</h1>
                        <div class="short-description">{!!    $product->short_description  !!} </div>
                        <p class="pricing"><span class="price">{{ Helper::convertToPersianDigit(number_format($product->price)) ." ". $product->CostUnit->title }}</span></p>
                        <form method="post" class="product-single-form">
                            <div class="form-group">
                                <a href="{{ route('add_to_carts',['slug'=>$product->slug]) }}" class="btn btn-primary btn-addtocart-big"><i class="fa fa-cart-plus"></i> اضافه به سبد خرید</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END TOP MAIN -->
                <!-- BOTTOM INFO -->
                <div class="bottom">
                    <div class="custom-tabs-line tabs-line-bottom right-aligned product-carousel-tab">
                        <ul class="nav nav-pills" role="tablist">
                            <li ><a href="#tab-description" role="tab" data-toggle="tab">مشخصات</a></li>
                            <li class="active"><a href="#tab-reviews" role="tab" data-toggle="tab">توضیحات</a></li>
                        </ul>
                    </div>
                    <section class="tab-content">
                        <!-- product complete description -->
                        <div class="tab-pane fade tab-description " id="tab-description" >
                           {!! $product->body !!}
                        </div>
                        <!-- end product complete description -->
                        <!-- product reviews -->
                        <div class="tab-pane fade in active" id="tab-reviews">

                            <table class="table" style="margin-top: 30px">
                                <tr>
                                    <td>نویسنده</td>
                                    <td>{{ $product->Authors->first_name." ".$product->Authors->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>مترجم</td>
                                    <td>{{ $product->Translators->first_name." ".$product->Translators->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>قطع کتاب</td>
                                    <td>{{ $product->Sizes->title }}</td>
                                </tr>
                                <tr>
                                    <td>نوع جلد کتاب</td>
                                    <td>{{ $product->VolumeTypes->title }}</td>
                                </tr>
                                <tr>
                                    <td>ناشر کتاب</td>
                                    <td>{{ $product->Publishers->first_name." ".$product->Publishers->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>زبان اصلی کتاب</td>
                                    <td>{{ $product->Language->title }}</td>
                                </tr>
                                <tr>
                                    <td>تعداد صفحات</td>
                                    <td>{{ $product->pages_num }}</td>
                                </tr>
                                <tr>
                                    <td>سال انتشار</td>
                                    <td>{{ $product->release_date }}</td>
                                </tr>
                                <tr>
                                    <td>نوبت چاپ</td>
                                    <td>{{ $product->print_round }}</td>
                                </tr>
                                <tr>
                                    <td>شابک</td>
                                    <td>{{ $product->ISBN }}</td>
                                </tr>
                                <tr>
                                    <td> ابعاد کتاب طول </td>
                                    <td>{{ $product->dimension_length." ".$product->MeasurementUnit->title }}</td>
                                </tr>
                                <tr>
                                    <td> ابعاد کتاب عرض </td>
                                    <td>{{ $product->dimension_width." ".$product->MeasurementUnit->title}}</td>
                                </tr>
                                <tr>
                                    <td> ابعاد کتاب ارتفاع </td>
                                    <td>{{ $product->dimension_height." ".$product->MeasurementUnit->title}}</td>
                                </tr>
                                <tr>
                                    <td>وزن</td>
                                    <td>{{ $product->weight." ".$product->WeightUnit->title }}</td>
                                </tr>

                            </table>
                        </div>
                        <!-- end product reviews -->
                    </section>
                </div>
                <!-- BOTTOM INFO -->
            </section>
            <!-- END SINGLE PRODUCT -->

        </div>
    </div>
    <!-- END PAGE CONTENT -->

@endsection
