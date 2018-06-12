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
                    {{ Form::model($menus, ['route' => ['save_menu', $menus->id], 'method' => 'patch']) }}
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
                            @php
                                function limit($array,$level){

                                    foreach ($array as $arrData){
                                     echo "<option value=".$arrData['id'].">".$level.' '.$arrData["name"]."</option>";
                                    if($arrData["children"] !=null)
                                        limit($arrData["children"],$level."&#160;&#160;&#160;");
                                    }
                                }
                            limit($menuData,'');
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




        </div>
    </div>

@endsection