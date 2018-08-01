@extends('admin::master.layout')
@section('title') پنل مدیریتی  @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i> نمایش پیغام</a></li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">نمایش پیغام </h5>
                    </div>
                    @if(($data))
                            <div class="panel-body">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name" class="text-black">نام و نام خانوادگی : </label>
                                        {{$data->name}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="text-black"> ایمیل : </label>
                                        {{$data->email}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lat_google" class="text-black">شماره موبایل : </label>
                                        {{$data->mobile}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="long_google" class="text-black"> موضوع : </label>
                                        {{$data->subject}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="long_google" class="text-black">متن : </label>
                                        {{$data->message}}
                                    </div>
                                </div>



                            </div>
                    @else
                        <div class="alert alert-warning no-border">
                            اطلاعاتی موجود نمی باشد
                        </div>

                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection