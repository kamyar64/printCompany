@extends('admin::master.layout')
@section('title') پنل مدیریتی - ایجاد خبر @endsection
@section('pathOfSite')
    <ul class="breadcrumb">
        <li><a href="#"><i class="icon-home2 position-left"></i>خبر</a></li>
        <li class="active">ایجاد خبر</li>
    </ul>
@endsection

@section('content')
    <div class="content">
        <div class="row">

            @include('admin::master.errors')
            <div class="col-md-12">
                @if(isset($news_data))
                    {{ Form::model($news_data, ['route' => ['update_news', $news_data->id], 'method' => 'patch','enctype'=>"multipart/form-data"]) }}
                @else
                    {{ Form::open(['route' => 'save_news','enctype'=>"multipart/form-data"]) }}
                @endif
                    {!!
                    $news_data->date_published=Helper::jDateFromDateTimeWithDayName($news_data->date_published);
                    $news_data->date_expired=Helper::jDateFromDateTimeWithDayName($news_data->date_expired);
                     !!}
                {{csrf_field()}}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">ایجاد خبر</h5>
                            <hr>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {{Form::label('date_published', 'تاریخ انتشار')}}
                                        {{Form::text('date_published',Form::getValueAttribute('date_published', null) ,['class'=>'form-control date_picker','required','placeholder'=>'تاریخ انتشار','dir'=>'ltr'])}}
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        {{Form::label('date_expired', 'تاریخ انقضا')}}
                                        {{ Form::text('date_expired',Form::getValueAttribute('date_expired', null) ,['class'=>'form-control date_picker','required','placeholder'=>'تاریخ انقضا','dir'=>'ltr'])}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    {{Form::label('picture', 'عکس')}}
                                {{ Form::File('picture' ,['class'=>'file-input','data-show-preview'=>'true','data-show-caption'=>'true','data-show-upload'=>'false'])}}
                                </div>
                                <div class="col-md-5">
                                    @if($news_data)
                                        <img src="{{asset('images/news-images/'.$news_data->picture)}}" width="60" height="60">
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
                                        {{Form::label('news_group', 'گروه خبری')}}
                                        <select name="news_group" class="form-control">
                                            @foreach($all_news_group as $all_news_groups)
                                                <option
                                                        @if($all_news_groups->id==$news_data->news_group) selected @endif
                                                        value=" {{$all_news_groups->id}}">
                                                    {{$all_news_groups->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{Form::label('news_priority', 'اولویت ')}}
                                        <select name="news_priority" class="form-control">
                                            @foreach($all_priority as $all_prioritys)
                                                <option
                                                        @if($all_prioritys->id==$news_data->news_priority) selected @endif
                                                value=" {{$all_prioritys->id}}">
                                                    {{$all_prioritys->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                               <div class="col-md-3">
                                    <div class="form-group">
                                        {{Form::label('department', 'دپارتمان ')}}
                                        <select name="departments" class="form-control">
                                            @foreach($all_department as $all_departments)
                                                <option
                                                        @if($all_departments->id==$news_data->department) selected @endif
                                                value=" {{$all_departments->id}}">
                                                    {{$all_departments->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('abstract', 'چکیده')}}
                                    {{ Form::textArea('abstract',Form::getValueAttribute('abstract', null) ,['class'=>'form-control','required','placeholder'=>'چکیده'])}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('body', 'متن خبر')}}
                                    {{ Form::textArea('body',Form::getValueAttribute('body', null) ,['class'=>'form-control','required','placeholder'=>'متن خبر'])}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    {{Form::label('reference', 'منبع')}}
                                    {{ Form::text('reference',Form::getValueAttribute('reference', null) ,['class'=>'form-control','required','placeholder'=>'منبع','dir'=>'ltr'])}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    {{Form::label('key_words', 'کلمات کلیدی')}}
                                    {{ Form::text('key_words',Form::getValueAttribute('key_words', null) ,['class'=>'form-control','required','placeholder'=>'کلمات کلیدی','dir'=>'ltr'])}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">درج  خبر  <i class="icon-arrow-left13 position-right"></i></button>
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
    CKEDITOR.replace( 'abstract' );
    CKEDITOR.replace( 'body' );

</script>
@endsection