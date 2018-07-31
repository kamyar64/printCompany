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
                        <li data-step="3" data-name="payment"><span class="step-number">{{ Helper::convertToPersianDigit(3)}}</span><span class="title"> فاکتور نهایی</span></li>
                    </ul>
                </div>
                @include('master.errors')
                <div class="step-content">
                    <form action="{{ route('save_order') }}" id="select-address-form" method="post">
                        {{ csrf_field() }}
                    @foreach($address as $data)

                        <div class="panel @if($data->default==0) panel-primary @elseif($data->default==1) panel-success @endif ">
                            <div class="panel-heading">   <input  @if($data->default==1) checked @endif required name="addressRadio" class="addressRadio text-right" type="radio" value="{{$data->id}}">  </div>
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> نام و نام خانوادگی :</label>
                                        {{ $data->name }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> شماره موبایل :</label>
                                        {{ Helper::convertToPersianDigit($data->mobile) }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> تلفن :</label>
                                        {{ Helper::convertToPersianDigit($data->tell) }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> کد پستی :</label>
                                        {{ Helper::convertToPersianDigit($data->zip_code) }}
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label> ایمیل :</label>
                                        {{($data->email) }}
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label> آدرس کامل :</label>
                                        {{ Helper::convertToPersianDigit($data->address) }}
                                    </div>
                                </div>
                                <div class="col-md-2 text-right">
                                    <div class="form-group">
                                        <a href="{{ route('delete_address',['id'=>$data->id]) }}" style="color: red">حذف آدرس</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </form>
                @if(isset($address_data))
                    {{ Form::model($address_data, ['route' => ['update_address', $address_data->id], 'method' => 'patch']) }}
                @else
                    {{ Form::open(['route' => 'save_address']) }}
                @endif
                    <!-- SHOPPING CART -->
                    <div class="panel panel-default">
                        <div class="panel-heading">اضافه کردن آدرس جدید</div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('name', 'نام')}}
                                    {{ Form::text('name',Form::getValueAttribute('name', null) ,['class'=>'form-control','required','placeholder'=>'نام'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('family', 'نام خانوادگی')}}
                                    {{ Form::text('family',Form::getValueAttribute('family', null) ,['class'=>'form-control','required','placeholder'=>'نام خانوادگی'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('mobile', 'شماره موبایل')}}
                                    {{ Form::text('mobile',Form::getValueAttribute('mobile', null) ,['class'=>'form-control','required','placeholder'=>'شماره موبایل'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('tell', 'شماره تماس')}}
                                    {{ Form::text('tell',Form::getValueAttribute('tell', null) ,['class'=>'form-control','required','placeholder'=>'شماره تماس'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('zip_code', 'کد پستی')}}
                                    {{ Form::text('zip_code',Form::getValueAttribute('zip_code', null) ,['class'=>'form-control','required','placeholder'=>'کد پستی'])}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    {{Form::label('address', 'آدرس')}}
                                    {{ Form::text('address',Form::getValueAttribute('address', null) ,['class'=>'form-control','required','placeholder'=>'آدرس'])}}
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    {{Form::label('email', 'ایمیل')}}
                                    {{ Form::text('email',Form::getValueAttribute('email', null) ,['class'=>'form-control','required','placeholder'=>'ایمیل'])}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-warning">درج  آدرس  <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                <!-- BUTTONS -->
                <div class="actions">
                    <button id="btn-select-address" type="button" class="btn btn-primary  btn-lg btn-next"><span>صدور فاکتور</span><i class="fa fa-arrow-circle-left"></i></button>
                </div>
                <!-- END BUTTONS -->
            </div>

        </div>
    </div>
    <!-- END PAGE CONTENT -->

@endsection
