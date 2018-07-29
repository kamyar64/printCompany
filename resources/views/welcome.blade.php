@extends('master.layout')
@section('content')

        <!-- PAGE HEADER DEFAULT -->
        <div class="page-header ">
            <div class="container">
                <ol class="breadcrumb link-accent">
                    <li><a href="{{ route('home') }}">خانه</a></li>
                    <li><a href="{{ route('products') }}">محصولات</a></li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
        <!-- END PAGE HEADER DEFAULT -->
        <!-- PAGE CONTENT -->
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <!-- FILTER CATEGORY -->
                        <div class="widget widget-filter ">
                            <h4 class="widget-title">محصولات</h4>
                            <ul class="list-unstyled product-attribute-link-list" dir="rtl">
                                @foreach($category as $category_data)
                                    <li><a href="{{ route('products',['slug'=>$category_data->slug]) }}">{{ $category_data->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- END FILTER CATEGORY -->

                    </div>
                    <div class="col-md-9">
                        <div class="datatable-footer">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                {{ $product->links('pagination.default') }}
                            </div>
                        </div>
                        <!-- PRODUCT DISPLAY -->
                            <ul class="list-inline row product-grid">
                                @foreach($product as $product_data)
                                <li class="col-md-3">
                                    <div class="product-item" style="margin: 0 auto" title="{{($product_data->title)}}">
                                        <a href="{{route('product',['slug'=>$product_data->id])}}">
                                            <img src="{{asset('images/products')}}/{{$product_data->picture}}" class="img-responsive" alt="Product Image"  width="100">
                                            {{--<span class="label label-info">BEST SELLER</span>--}}
                                        </a>
                                        <div class="product-info">
                                            <h3 class="title">  <a href="{{route('product',['slug'=>$product_data->id])}}" title="{{($product_data->title)}}">{{($product_data->title)}}</a></h3>
                                            <div class="short-description">{!! str_limit($product_data->body,100) !!}</div>
                                            <div class="bottom ">
                                                <div class="price">{{ Helper::convertToPersianDigit(number_format($product_data->price)) ." ". $product_data->CostUnit->title}}</div>
                                                <a href="{{ route('add_to_carts',['slug'=>$product_data->slug]) }}" class="btn btn-primary "><i class="fa fa-cart-plus"></i> اضافه به سبد خرید</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        <!-- PRODUCT DISPLAY -->
                        <div class="datatable-footer">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                {{ $product->links('pagination.default') }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->



@endsection