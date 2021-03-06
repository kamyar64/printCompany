@extends('admin::master.layout')
@section('title') پنل مدیریتی  @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i> لیست پیغام ها</a></li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">




            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">لیست پیغام ها</h5>
                    </div>
                    @if(count($data)>0)
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            @include('admin::master.table_header')

                            <div class="datatable-scroll">

                                <table class="table datatable-basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row" class="warning">
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">نام و نام خانوادگی</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">ایمیل</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">موبایل</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">موضوع</th>
                                        <th  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data as $messages)
                                        <tr role="row"  class="odd @if($messages->isRead==0) danger @endif">
                                            <td >{{$messages->name}}</td>
                                            <td >{{$messages->email}}</td>
                                            <td >{{$messages->mobile}}</td>
                                            <td >{{$messages->subject}}</td>
                                            <td width="100">
                                                <ul class="icons-list">
                                                    <li class="text-primary-600"><a href="{{ route('show_contact_ue_message',['id'=>$messages->id]) }}"><i class="icon-pencil7"></i></a></li>
                                                    <li class="@if($messages->isDelete==1) text-success-600 @else text-danger-600 @endif">
                                                        <form action="{{ route('delete_contact_ue_message',['id'=>$messages->id])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="@if($messages->isDelete==1) icon-rotate-cw3 @else icon-trash @endif " style="background: none; border: none" ></button>
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