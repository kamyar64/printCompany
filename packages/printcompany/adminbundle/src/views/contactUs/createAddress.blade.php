@extends('admin::master.layout')
@section('title') پنل مدیریتی - آدرس ها @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i> ارتباط با ما</a></li>
        <li class="active">ایجاد آدرس</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin::master.errors')
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">لیست آدرس ها</h5>
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
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">Google Lat</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">Google Long</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data as $createAddresss)
                                        <tr role="row"  class="odd @if($createAddresss->isDelete==1) danger @endif">
                                            <td >{{$createAddresss->name}}</td>
                                            <td >{{$createAddresss->address}}</td>
                                            <td >{{$createAddresss->lat_google}}</td>
                                            <td >{{$createAddresss->long_google}}</td>
                                            <td width="100">
                                                <ul class="icons-list">
                                                    <li class="text-primary-600"><a href="{{ route('edit_contact_us_address',['id'=>$createAddresss->id]) }}"><i class="icon-pencil7"></i></a></li>
                                                    <li class="@if($createAddresss->isDelete==1) text-success-600 @else text-danger-600 @endif">
                                                        <form action="{{ route('delete_contact_us_address',['id'=>$createAddresss->id])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="@if($createAddresss->isDelete==1) icon-rotate-cw3 @else icon-trash @endif " style="background: none; border: none" ></button>
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

            <div class="col-md-12">

                @if(isset($createAddress))
                    {{ Form::model($createAddress, ['route' => ['update_contact_us_address', $createAddress->id], 'method' => 'patch']) }}
                @else
                    {{ Form::open(['route' => 'save_contact_us_address']) }}
                @endif

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">ایجاد آدرس</h5>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-5">
                            <div class="form-group">
                                {{Form::label('name', 'نام ')}}
                                {{ Form::text('name',Form::getValueAttribute('name', null) ,['class'=>'form-control','required','placeholder'=>'نام '])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('address', 'آدرس')}}
                            {{ Form::textarea('address',Form::getValueAttribute('address', null) ,['class'=>'form-control','required','placeholder'=>'آدرس'])}}
                        </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            {{Form::label('lat_google', 'lat_google')}}
                            {{ Form::text('lat_google',Form::getValueAttribute('lat_google', null) ,['class'=>'form-control','placeholder'=>'lat_google'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('long_google', 'long_google')}}
                            {{ Form::text('long_google',Form::getValueAttribute('long_google', null) ,['class'=>'form-control','placeholder'=>'long_google'])}}
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">درج آدرس جدید <i class="icon-arrow-left13 position-right"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
                {{ Form::close() }}




            </div>




        </div>
    </div>

@endsection