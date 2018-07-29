@extends('admin::master.layout')
@section('title') پنل مدیریتی -  شبکه های اجتماعی @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i> شبکه های اجتماعی</a></li>
        <li class="active">ایجاد  شبکه های اجتماعی</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                @if(isset($createSocailNetwork))
                    {{ Form::model($createSocailNetwork, ['route' => ['update_social_network', $createSocailNetwork->id], 'method' => 'patch']) }}
                @else
                    {{ Form::open(['route' => 'save_social_network']) }}
                @endif

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">ایجاد  شبکه های اجتماعی</h5>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('name', 'نام')}}
                                {{ Form::text('name',Form::getValueAttribute('name', null) ,['class'=>'form-control','required','placeholder'=>'نام'])}}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('url', 'آدرس شبکه اجتماعی')}}
                                {{ Form::text('url',Form::getValueAttribute('url', null) ,['class'=>'form-control','required','placeholder'=>'http://www.facebook.com/my-profile'])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('url', 'آیکن')}}
                                {{ Form::text('icon',Form::getValueAttribute('icon', null) ,['class'=>'form-control','id'=>'icon','readonly','required','placeholder'=>'آیکن'])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                                <ul class="list-inline social-icons social-icons-bordered">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fa fa-soundcloud"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                    <li><a href="#"><i class="fa fa-yahoo"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                    <li><a href="#"><i class="fa fa-delicious"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-foursquare"></i></a></li>
                                </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">درج  شبکه های اجتماعی <i class="icon-arrow-left13 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

                @include('admin::master.errors')


            </div>
            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">لیست شبکه های اجتماعی</h5>
                    </div>
                    @if(count($data)>0)
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            @include('admin::master.table_header')

                            <div class="datatable-scroll">

                                <table class="table datatable-basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row" class="warning">
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">نام</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">آدرس</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">آیکون</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data as $social)
                                        <tr role="row"  class="odd @if($social->isDelete==1) danger @endif">
                                            <td >{{$social->name}}</td>
                                            <td >{{$social->url}}</td>
                                            <td ><i class="{{$social->icon}}"></i></td>
                                            <td width="100">
                                                <ul class="icons-list">
                                                    <li class="text-primary-600"><a href="{{ route('edit_social_network',['id'=>$social->id]) }}"><i class="icon-pencil7"></i></a></li>
                                                    <li class="@if($social->isDelete==1) text-success-600 @else text-danger-600 @endif">
                                                        <form action="{{ route('delete_social_network',['id'=>$social->id])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="@if($social->isDelete==1) icon-rotate-cw3 @else icon-trash @endif " style="background: none; border: none" ></button>
                                                        </form></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>


                            </div>

                            <div class="datatable-footer">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    {{ $data->links('admin::pagination.default') }}
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



    {{--        <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">لیست دپارتمان ها</h5>
                    </div>
                    @if(count($data)>0)
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            @include('admin::master.table_header')

                            <div class="datatable-scroll">

                                <table class="table datatable-basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row" class="warning">
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">نام</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data as $ContactUss)
                                        <tr role="row"  class="odd @if($ContactUss->isDelete==1) danger @endif">
                                            <td >{{$ContactUss->title}}</td>
                                            <td width="100">
                                                <ul class="icons-list">
                                                    <li class="text-primary-600"><a href="{{ route('edit_department',['id'=>$ContactUss->id]) }}"><i class="icon-pencil7"></i></a></li>
                                                    <li class="@if($ContactUss->isDelete==1) text-success-600 @else text-danger-600 @endif">
                                                        <form action="{{ route('delete_department',['id'=>$ContactUss->id])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="@if($ContactUss->isDelete==1) icon-rotate-cw3 @else icon-trash @endif " style="background: none; border: none" ></button>
                                                        </form></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>


                            </div>

                            <div class="datatable-footer">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    {{ $data->links('admin::pagination.default') }}
                                </div>
                            </div>



                        </div>
                    @else
                        <div class="alert alert-warning no-border">
                            اطلاعاتی موجود نمی باشد
                        </div>

                    @endif
                </div>
            </div>--}}

        </div>
    </div>

@endsection