@extends('admin::master.layout')
@section('title') پنل مدیریتی - تلفن و ایمیل @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i> ارتباط با ما</a></li>
        <li class="active">ایجاد تلفن و ایمیل</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">

            <div class="col-md-6">
                @if(isset($ContactUsTellAndEmail))
                    {{ Form::model($ContactUsTellAndEmail, ['route' => ['update_contact_us_tell_email', $ContactUsTellAndEmail->id], 'method' => 'patch']) }}
                @else
                    {{ Form::open(['route' => 'save_contact_us_tell_email']) }}
                @endif

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">ایجاد  تلفن و ایمیل</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            {{Form::label('name', 'نام ')}}
                            {{ Form::text('name',Form::getValueAttribute('name', null) ,['class'=>'form-control','required','placeholder'=>'نام '])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('value', 'مقدار ')}}
                            {{ Form::text('value',Form::getValueAttribute('value', null) ,['class'=>'form-control','required','placeholder'=>'مقدار '])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('type', 'نوع ')}}
                           <select name="type" class="form-control ">
                               <option value="0">تلفن</option>
                               <option value="1">ایمیل</option>
                           </select>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">درج تلفن و ایمیل جدید <i class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

                @include('admin::master.errors')


            </div>


            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">لیست تلفن و ایمیل ها</h5>
                    </div>
                    @if(count($data)>0)
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            @include('admin::master.table_header')

                            <div class="datatable-scroll">

                                <table class="table datatable-basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row" class="warning">
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">نام</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">مقدار</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">نوع</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data as $ContactUsTellAndEmails)
                                        <tr role="row"  class="odd @if($ContactUsTellAndEmails->isDelete==1) danger @endif">
                                            <td >{{$ContactUsTellAndEmails->name}}</td>
                                            <td >{{$ContactUsTellAndEmails->value}}</td>
                                            <td > @if($ContactUsTellAndEmails->type==0) {{'تلفن'}} @else {{'ایمیل'}} @endif</td>
                                            <td width="100">
                                                <ul class="icons-list">
                                                    <li class="text-primary-600"><a href="{{ route('edit_contact_us_tell_email',['id'=>$ContactUsTellAndEmails->id]) }}"><i class="icon-pencil7"></i></a></li>
                                                    <li class="@if($ContactUsTellAndEmails->isDelete==1) text-success-600 @else text-danger-600 @endif">
                                                        <form action="{{ route('delete_contact_us_tell_email',['id'=>$ContactUsTellAndEmails->id])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="@if($ContactUsTellAndEmails->isDelete==1) icon-rotate-cw3 @else icon-trash @endif " style="background: none; border: none" ></button>
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