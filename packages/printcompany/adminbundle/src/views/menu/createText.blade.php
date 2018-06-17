@extends('admin::master.layout')
@section('title') پنل مدیریتی - ایجاد متن منو @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i>منو</a></li>
        <li class="active">ایجاد متن منو</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">

            @include('admin::master.errors')
            <div class="col-md-12">
                @if(isset($menus_data))
                    {{ Form::model($menus_data, ['route' => ['update_menu_text', $menus_data->id], 'method' => 'patch']) }}
                @else
                    {{ Form::open(['route' => 'save_menu_text']) }}
                @endif
                {{csrf_field()}}
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">ایجاد متن منو</h5>
                        <hr>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {{Form::label('menu_id', 'انتخاب منو')}}
                                    <select name="menu_id" class="form-control selectpicker menu_id">
                                        <option value="0">انتخاب منو</option>
                                        @foreach($menu as $menu_data)
                                            <option
                                                    @if(isset($menus_data) && $menu_data->id==$menus_data->menu_id) selected @endif

                                            value=" {{$menu_data->id}}">
                                                {{$menu_data->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('text', 'متن')}}
                                    {{ Form::textarea('text',Form::getValueAttribute('text', null) ,['class'=>'form-control','required','placeholder'=>'متن'])}}
                                </div>
                            </div>
                        </div>



                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">درج  متن منو  <i class="icon-arrow-left13 position-right"></i></button>
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
        CKEDITOR.replace( 'text' );
    </script>
@endsection