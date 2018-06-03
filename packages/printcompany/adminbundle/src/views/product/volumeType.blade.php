@extends('admin::master.layout')
@section('title') پنل مدیریتی -  نوع جلد کتاب @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i> محصولات</a></li>
        <li class="active">  نوع جلد کتاب</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">

            <div class="col-md-6">
                @if(isset($volume))
                    {{ Form::model($volume, ['route' => ['update_product_volume_type', $volume->id], 'method' => 'patch']) }}
                @else
                    {{ Form::open(['route' => 'save_product_volume_type']) }}
                @endif

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">ایجاد  نوع جلد</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            {{Form::label('title', 'نام  نوع جلد')}}
                            {{ Form::text('title',Form::getValueAttribute('title', null) ,['class'=>'form-control','required','placeholder'=>'نام  نوع جلد'])}}
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">درج  نوع جلد <i class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

                @include('admin::master.errors')


            </div>


            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">لیست  نوع جلد ها</h5>
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

                                    @foreach($data as $volumeTypeData)
                                        <tr role="row"  class="odd @if($volumeTypeData->isDelete==1) danger @endif">
                                            <td >{{$volumeTypeData->title}}</td>
                                            <td width="100">
                                                <ul class="icons-list">
                                                    <li class="text-primary-600"><a href="{{ route('edit_product_volume_type',['id'=>$volumeTypeData->id]) }}"><i class="icon-pencil7"></i></a></li>
                                                    <li class="@if($volumeTypeData->isDelete==1) text-success-600 @else text-danger-600 @endif">
                                                        <form action="{{ route('delete_product_volume_type',['id'=>$volumeTypeData->id])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="@if($volumeTypeData->isDelete==1) icon-rotate-cw3 @else icon-trash @endif " style="background: none; border: none" ></button>
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

        </div>
    </div>

@endsection