@extends('admin::master.layout')
@section('title') پنل مدیریتی - ایجاد محصول @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i>محصول</a></li>
        <li class="active">ایجاد محصول</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">

            @include('admin::master.errors')
            <div class="col-md-12">
                @if(isset($product_data))
                    {{ Form::model($product_data, ['route' => ['update_product', $product_data->id], 'method' => 'patch','enctype'=>"multipart/form-data"]) }}
                @else
                    {{ Form::open(['route' => 'save_product','enctype'=>"multipart/form-data"]) }}
                @endif
                {{csrf_field()}}
                    @php
                        if(isset($product_data)){
                        $product_data->release_date=Helper::jDateFromDateTimeWithDayName($product_data->release_date);
                        }
                    @endphp
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">ایجاد محصول</h5>
                        <hr>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-5">
                                {{Form::label('picture', 'عکس')}}
                                {{ Form::File('picture' ,['class'=>'file-input','data-show-preview'=>'true','data-show-caption'=>'true','data-show-upload'=>'false'])}}
                            </div>
                            <div class="col-md-5">
                                @if(isset($product_data))
                                    <img src="{{asset('images/products/'.$product_data->picture)}}" width="60" height="60">
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::label('title', 'عنوان')}}
                                    {{ Form::text('title',Form::getValueAttribute('title', null) ,['class'=>'form-control','required','placeholder'=>'عنوان'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_categories', 'دسته محصول')}}

                                    <select name="product_categories" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_categories as $product_categories_data)
                                            <option
                                                    @if(isset($product_data) && $product_categories_data->id==$product_data->product_categories) selected @endif
                                            value=" {{$product_categories_data->id}}">
                                                {{$product_categories_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_statuses', 'وضعیت محصول')}}
                                    <select name="product_statuses" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_statuses as $product_statuses_data)
                                            <option
                                                    @if( isset($product_data) && $product_statuses_data->id==$product_data->news_priority) selected @endif
                                            value=" {{$product_statuses_data->id}}">
                                                {{$product_statuses_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_authors', 'نویسنده')}}
                                    <select name="product_authors" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_authors as $product_authors_data)
                                            <option
                                                    @if(isset($product_data) && $product_authors_data->id==$product_data->department) selected @endif
                                            value=" {{$product_authors_data->id}}">
                                                {{$product_authors_data->first_name.'  '.$product_authors_data->last_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_translators', 'مترجم')}}
                                    <select name="product_translators" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_translators as $product_translators_data)
                                            <option
                                                    @if(isset($product_data) && $product_translators_data->id==$product_data->department) selected @endif
                                            value=" {{$product_translators_data->id}}">
                                                {{$product_translators_data->first_name.' '.$product_translators_data->last_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_sizes', 'قطع کتاب')}}
                                    <select name="product_sizes" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_sizes as $product_sizes_data)
                                            <option
                                                    @if(isset($product_data) && $product_sizes_data->id==$product_data->department) selected @endif
                                            value=" {{$product_sizes_data->id}}">
                                                {{$product_sizes_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_volume_types', 'نوع جلد کتاب')}}
                                    <select name="product_volume_types" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_volume_types as $product_volume_types_data)
                                            <option
                                                    @if(isset($product_data) && $product_volume_types_data->id==$product_data->department) selected @endif
                                            value=" {{$product_volume_types_data->id}}">
                                                {{$product_volume_types_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_publishers', 'ناشر کتاب')}}
                                    <select name="product_publishers" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_publishers as $product_publishers_data)
                                            <option
                                                    @if(isset($product_data) && $product_publishers_data->id==$product_data->department) selected @endif
                                            value=" {{$product_publishers_data->id}}">
                                                {{$product_publishers_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_languages', 'زبان اصلی کتاب')}}
                                    <select name="product_languages" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_languages as $product_languages_data)
                                            <option
                                                    @if(isset($product_data) && $product_languages_data->id==$product_data->department) selected @endif
                                            value=" {{$product_languages_data->id}}">
                                                {{$product_languages_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                         <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('pages_num', 'تعداد صفحات')}}
                                    {{ Form::text('pages_num',Form::getValueAttribute('pages_num', null) ,['class'=>'form-control ','required','placeholder'=>'تعداد صفحات'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('release_date', 'سال انتشار')}}
                                    {{ Form::text('release_date',Form::getValueAttribute('release_date', null) ,['class'=>'form-control date_picker','required','placeholder'=>'سال انتشار','dir'=>'ltr','readonly'=>'true'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('print_round', 'نوبت چاپ')}}
                                    {{ Form::text('print_round',Form::getValueAttribute('print_round', null) ,['class'=>'form-control','required','placeholder'=>'نوبت چاپ'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('ISBN', 'شابک')}}
                                    {{ Form::text('ISBN',Form::getValueAttribute('key_words', null) ,['class'=>'form-control ISBN','required','placeholder'=>'شابک','dir'=>'ltr'])}}
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('dimension_length', ' ابعاد کتاب طول ')}}
                                    {{ Form::text('dimension_length',Form::getValueAttribute('dimension_length', null) ,['class'=>'form-control','required','placeholder'=>' ابعاد کتاب طول'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('dimension_width', ' ابعاد کتاب عرض ')}}
                                    {{ Form::text('dimension_width',Form::getValueAttribute('dimension_width', null) ,['class'=>'form-control','required','placeholder'=>' ابعاد کتاب عرض'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('dimension_height', ' ابعاد کتاب ارتفاع ')}}
                                    {{ Form::text('dimension_height',Form::getValueAttribute('dimension_height', null) ,['class'=>'form-control','required','placeholder'=>' ابعاد کتاب ارتفاع'])}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('product_measurement_units', 'واحد اندازه گیری')}}
                                    <select name="product_measurement_units" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_measurement_units as $product_measurement_units_data)
                                            <option
                                                    @if(isset($product_data) && $product_measurement_units_data->id==$product_data->department) selected @endif
                                            value=" {{$product_measurement_units_data->id}}">
                                                {{$product_measurement_units_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('weight', ' وزن  ')}}
                                    {{ Form::text('weight',Form::getValueAttribute('weight', null) ,['class'=>'form-control','required','placeholder'=>' وزن '])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('product_weight_units', 'واحد وزن')}}
                                    <select name="product_weight_units" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_weight_units as $product_weight_units_data)
                                            <option
                                                    @if(isset($product_data) && $product_weight_units_data->id==$product_data->department) selected @endif
                                            value=" {{$product_weight_units_data->id}}">
                                                {{$product_weight_units_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('price', ' قیمت  ')}}
                                    {{ Form::text('price',Form::getValueAttribute('price', null) ,['class'=>'form-control','required','placeholder'=>' قیمت '])}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('product_cost_units', 'واحد قیمت')}}
                                    <select name="product_cost_units" class="form-control selectpicker " required data-live-search="true">
                                        @foreach($product_cost_units as $product_cost_units_data)
                                            <option
                                                    @if(isset($product_data) && $product_cost_units_data->id==$product_data->department) selected @endif
                                            value=" {{$product_cost_units_data->id}}">
                                                {{$product_cost_units_data->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('body', ' متن  ')}}
                                {{ Form::textarea('body',Form::getValueAttribute('body', null) ,['class'=>'form-control','required','placeholder'=>' متن '])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">درج  محصول  <i class="icon-arrow-left13 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


                {{ Form::close() }}




            </div>


            <Script>

            </Script>

        </div>
    </div>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection