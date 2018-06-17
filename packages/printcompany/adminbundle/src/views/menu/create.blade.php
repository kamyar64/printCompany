@extends('admin::master.layout')
@section('title') پنل مدیریتی - منو @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i> منو</a></li>
        <li class="active">ایجاد منو</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">

            <div class="col-md-6">
                @if(isset($menus))
                    {{ Form::model($menus, ['route' => ['update_menu', $menus->id], 'method' => 'patch']) }}
                @else
                    {{ Form::open(['route' => 'save_menu']) }}
                @endif


                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">ایجاد منو</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            {{Form::label('name', 'نام منو')}}
                            {{ Form::text('name',Form::getValueAttribute('name', null) ,['class'=>'form-control','required','placeholder'=>'نام منو'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('slug', 'نام انگلیسی')}}
                            {{ Form::text('slug',Form::getValueAttribute('slug', null) ,['class'=>'form-control','required','placeholder'=>'نام انگلیسی'])}}
                        </div>
                        <div class="form-group">

                            {{Form::label('parent_id', 'زیر مجموعه')}}
                            <Select name="parent_id" class="form-control selectpicker">
                                <option value="0">زیر مجموعه اصلی</option>
                            @php
                                function limit($array,$level,$editMenu){

                                    foreach ($array as $arrData){
                                   $selected='';
                                    if(isset($editMenu) and $editMenu==$arrData["id"] )
                                    $selected= 'selected';


                                     echo "<option  ".$selected." value=".$arrData['id'].">".$level.' '.$arrData["name"]."</option>";
                                    if($arrData["children"] !=null)
                                        limit($arrData["children"],$level."&#160;&#160;&#160;",$editMenu);
                                    }
                                }
                                if(isset($menus))
                                $mn=$menus->parent_id ;
                                else $mn=null;
                            limit($menuData,'',$mn);
                            @endphp
                            </Select>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">درج منو <i class="icon-arrow-left13 position-right"></i></button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

                @include('admin::master.errors')


            </div>

            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">لیست منو ها </h5>
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

                                    @foreach($data as $menusData)
                                        <tr role="row"  class="odd @if($menusData->isDelete==1) danger @endif">
                                            <td >{{$menusData->name}}</td>
                                            <td width="100">
                                                <ul class="icons-list">
                                                    <li class="text-primary-600"><a href="{{ route('edit_menu',['id'=>$menusData->id]) }}"><i class="icon-pencil7"></i></a></li>
                                                    <li class="@if($menusData->isDelete==1) text-success-600 @else text-danger-600 @endif">
                                                        <form action="{{ route('delete_menu',['id'=>$menusData->id])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="@if($menusData->isDelete==1) icon-rotate-cw3 @else icon-trash @endif " style="background: none; border: none" ></button>
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