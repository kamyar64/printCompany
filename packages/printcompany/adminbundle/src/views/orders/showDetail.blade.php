@extends('admin::master.layout')
@section('title') پنل مدیریتی - نمایش سفارسات @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i>سفارسات</a></li>
        <li class="active">نمایش سفارشات </li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="panel panel-flat border-top-lg border-top-warning">
                <div class="panel-heading">
                    <h6 class="panel-title">کاربر ثبت نامی</h6>
                </div>

                <div class="panel-body">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> نام و نام خانوادگی :</label>
                            {{ $data->user->name }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> نام کاربری و ایمیل :</label>
                            {{ $data->user->email}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> تاریخ ثبت نام کاربر :</label>
                            {{ Helper::convertToPersianDigit(Helper::jDateFromDateTimeWithDayName($data->user->created_at))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                <h6 class="alert-heading text-semibold address-text" >آدرس انتخابی مشترک جهت ارسال مرسوله</h6>
                <div class="col-md-3">
                    <div class="form-group">
                        <label> نام و نام خانوادگی :</label>
                        {{ $data->userAddress->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> شماره موبایل :</label>
                            {{ Helper::convertToPersianDigit($data->userAddress->mobile) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> تلفن :</label>
                            {{ Helper::convertToPersianDigit($data->userAddress->tell) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> کد پستی :</label>
                            {{ Helper::convertToPersianDigit($data->userAddress->zip_code) }}
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label> ایمیل :</label>
                            {{($data->userAddress->email) }}
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label> آدرس کامل :</label>
                            {{ Helper::convertToPersianDigit($data->userAddress->address) }}
                        </div>
                    </div>
                </div>

            </div>
            <div class="alert alert-warning alert-styled-left alert-arrow-left alert-component">
                <h6 class="alert-heading text-semibold address-text" >مشخصات سفارش</h6>
                <div class="col-md-3">
                    <div class="form-group">
                        <label> تعداد کالای خریداری شده :</label>
                        {{ $data->count_order }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> تاریخ خرید :</label>
                            {{ Helper::convertToPersianDigit(Helper::jDateFromDateTimeWithDayName($data->created_at))}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label> شماره سفارش :</label>
                            {{ ($data->order_number) }}
                        </div>
                    </div>

                </div>

            </div>

            <div class="panel panel-flat border-left-xlg border-left-info">
                <div class="panel-heading">
                    <h6 class="panel-title"><span class="text-semibold">محصولات</h6>
                </div>

                <div class="panel-body">
                    <table class="table shopping-cart-table">
                        <thead>
                        <tr>
                            <th>محصول</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>تعداد</th>
                            <th>قیمت کل</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php $varkol=0 @endphp
                        <?php foreach($data->Products as $row) :?>
                        @php
                            $varkol+=( $row->qty*$row->price );
                        @endphp
                        <tr>
                            <td class="item" width="100">
                                <div class="media">
													<span class="media-left">
												<img width="100" src="{{ asset('images/products')."/".$row->products->picture }}" class="product-image" alt="Product Image">
											</span>
                                    <div class="media-body">
                                        <a href="#" class="product-title"><?php echo $row->products->name; ?></a>
                                    </div>
                                </div>
                            </td>
                            <td class="unit-price" width="450"><?php echo  $row->Products->title  ?></td>
                            <td class="unit-price"><?php echo  Helper::convertToPersianDigit(number_format($row->price)) ." ". $row->Products->CostUnit->title  ?></td>
                            <td class="qty">{{Helper::convertToPersianDigit($row->qty)}}</td>
                            <td class="total-price"><?php echo Helper::convertToPersianDigit(number_format($row->qty*$row->price))." ". $row->Products->CostUnit->title  ?></td>

                        </tr>
                        <?php endforeach;?>
                        <tr>
                            <td></td>
                            <td colspan="3" class="text-right">قیمت کل</td>
                            <td >{{Helper::convertToPersianDigit(number_format($varkol))}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        </div>
    </div>

@endsection