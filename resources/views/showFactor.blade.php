@extends('master.layout')
@section('content')
    <!-- BREADCRUMBS -->
    <div class="page-header ">
        <div class="container">
            <ol class="breadcrumb link-accent">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li>سبد خرید</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content product-single">
        <div class="container">

            <h1 class="margin-bottom-50">آدرس ها</h1>
            <div id="checkout-wizard" class="wizard-center">
                <div class="steps-container">
                    <ul class="list-inline steps">
                        <li data-step="1" data-name="shopping-cart" class="active"><span class="step-number">{{ Helper::convertToPersianDigit(1)}}</span> <span class="title">سبد خرید شما</span></li>
                        <li data-step="2" data-name="shipping" class="active"><span class="step-number">{{ Helper::convertToPersianDigit(2)}}</span><span class="title"> انتخاب آدرس و شماره تماس</span></li>
                        <li data-step="3" data-name="payment" class="active"><span class="step-number">{{ Helper::convertToPersianDigit(3)}}</span><span class="title"> فاکتور نهایی</span></li>
                    </ul>
                </div>
                @include('master.errors')
                <div class="step-content">
                    <div class="thankyou-message">
                        <h1>از خرید شما متشکریم.</h1>
                        <p class="order-info">
                           شماره رهگیری شما {{$order->order_number}}.
                            <br>به زودی برای ارسال و پرداخت محصول با شما تماس گرفته خواهد شد.
                        </p>
                    </div>
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
                        <?php foreach($products as $row) :?>
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
                            <td class="unit-price"><?php echo  Helper::convertToPersianDigit(number_format($row->price)) ." ". $row->price_unit  ?></td>
                            <td class="qty">{{Helper::convertToPersianDigit($row->qty)}}</td>
                            <td class="total-price"><?php echo Helper::convertToPersianDigit(number_format($row->qty*$row->price))." ". $row->price_unit  ?></td>

                        </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>

                    <div class="panel  panel-success  ">
                        <div class="panel-heading"> آدرس ارسالی </div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> نام و نام خانوادگی :</label>
                                    {{ $order->userAddress->name }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> شماره موبایل :</label>
                                    {{ Helper::convertToPersianDigit($order->userAddress->mobile) }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> تلفن :</label>
                                    {{ Helper::convertToPersianDigit($order->userAddress->tell) }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> کد پستی :</label>
                                    {{ Helper::convertToPersianDigit($order->userAddress->zip_code) }}
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label> ایمیل :</label>
                                    {{($order->userAddress->email) }}
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label> آدرس کامل :</label>
                                    {{ Helper::convertToPersianDigit($order->userAddress->address) }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- END PAGE CONTENT -->

@endsection
