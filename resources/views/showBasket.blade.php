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
            <h1 class="margin-bottom-50">سبد خرید شما</h1>
            <div id="checkout-wizard" class="wizard-center">
                <div class="steps-container">
                    <ul class="list-inline steps">
                        <li data-step="1" data-name="shopping-cart" class="active"><span class="step-number">{{ Helper::convertToPersianDigit(1)}}</span> <span class="title">سبد خرید شما</span></li>
                        <li data-step="2" data-name="shipping"><span class="step-number">{{ Helper::convertToPersianDigit(2)}}</span><span class="title"> انتخاب آدرس و شماره تماس</span></li>
                        <li data-step="3" data-name="payment"><span class="step-number">{{ Helper::convertToPersianDigit(3)}}</span><span class="title"> فاکتور نهایی</span></li>
                    </ul>
                </div>
                <div class="step-content">
                    <!-- SHOPPING CART -->
                    <div class="step-pane active" data-step="1">
                        <h2 class="sr-only">Shopping Cart</h2>
                        <form action="{{ route('basket-reload') }}" id="basket-first-form" method="post">
                            {{csrf_field()}}
                            <table class="table shopping-cart-table">
                                <thead>
                                <tr>
                                    <th>محصول</th>
                                    <th>قیمت</th>
                                    <th>تعداد</th>
                                    <th>قیمت کل</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $varkol=0 @endphp
                                <?php foreach(Cart::content() as $row) :?>
                                @php
                                    $varkol+=( $row->qty*$row->price );
                                @endphp
                                <tr>
                                    <td class="item">
                                        <div class="media">
													<span class="media-left">
												<img src="{{ asset('images/products')."/".$row->options->picture }}" class="product-image" alt="Product Image">
											</span>
                                            <div class="media-body">
                                                <a href="#" class="product-title"><?php echo $row->name; ?></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="unit-price"><?php echo  Helper::convertToPersianDigit(number_format($row->price)) ." ". $row->options->price_unit  ?></td>
                                    <td class="qty">
                                        <input type="number" name="product[{{$row->rowId }}]" min="1" max="999" value="{{$row->qty}}" class="form-control input-sm qty-spinner input-number_noSpinners">
                                    </td>
                                    <td class="total-price"><?php echo Helper::convertToPersianDigit(number_format($row->qty*$row->price))." ". $row->options->price_unit  ?></td>
                                    <td class="remove">
                                        <button type="button" class="btn btn-link btn-remove" title="Remove this item"><i class="fa fa-remove"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <hr>
                            <div class="shopping-cart-bottom">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <table class="table shopping-cart-summary text-right">
                                            <tbody>
                                            <tr>
                                                <td>قیمت کل</td>
                                                <td>{{Helper::convertToPersianDigit(number_format($varkol))}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- BUTTONS -->
                <div class="actions">
                    <form action="{{route('basket_address')}}">
                        <button id="reload-basket" type="button" class="btn btn-default btn-lg btn-prev "><span>به روز رسانی سبد خرید</span></button>
                        <button id="btn-checkout-next" type="submit" class="btn btn-primary  btn-lg btn-next"><span>مرحله بعد</span><i class="fa fa-arrow-circle-left"></i></button>
                    </form>
                </div>
                <!-- END BUTTONS -->
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->

@endsection
