@extends('master.layout')
@section('content')
    <div class="table-wrap">
        <div class="table-cell">
            <div class="header">

                <h1 class="heading">ورود به حساب کاربری</h1>
                <p>  حساب کاربری ندارید ؟ <a href="{{ route('register') }}">ثبت نام کنید</a></p>
            </div>
            <div class="auth-box" >
                <div class="container">

                    <div class="left auth-social" style="margin-top: 5em;" >
                        <div class="alert alert-info text-right"  >
                            <ul dir="rtl">
                                    <li>کاربر گرامی خوش آمدید</li>
                                    <li>جهت ورود به سایت نام کاربری و کلمه عبور خود را وارد کنید</li>
                                    <li>تصویر امنیتی به حروف کوچک و بزرگ حساس نمی باشد</li>
                            </ul>
                        </div>

                        @include('master.errors')
                        {{--<div class="">
                            <button class="btn btn-social facebook-bg"><i class="fa fa-facebook"></i> Sign In With Facebook</button>
                            <button class="btn btn-social twitter-bg"><i class="fa fa-twitter"></i> Sign In With Twitter</button>
                            <button class="btn btn-social google-plus-bg"><i class="fa fa-google-plus"></i> Sign In With Google</button>
                        </div>--}}
                    </div>
                    <span class="center-separator"></span>
                    <div class="right">
                        <form class="form-auth-small" method="post" action="login">
                            {{csrf_field()}}
                            <h2 class="heading text-right">ورود به حساب کاربری</h2>

                            <div class="form-group">
                                <label for="signup-email" class="control-label sr-only">نام کاربری یا ایمیل</label>
                                <input type="email"  class="form-control" name="email" id="signup-email" placeholder="نام کاربری یا ایمیل">
                            </div>
                            <div class="form-group">
                                <label for="signup-password" class="control-label sr-only">رمز عبور</label>
                                <input type="password"  class="form-control" name="password" id="signup-password" placeholder="رمز عبور">
                            </div>


                            <div class="input-group">
                              <span class="input-group-btn">
                                @captcha
                              </span>
                                <input style="margin-top:7px; " placeholder="تصویر امنیتی" type="text" id="captcha" name="captcha" class="form-control col-md-3" >

                            </div>

                            <div class="form-group clearfix" dir="rtl" >
                                <label class="fancy-checkbox element-right " >
                                    <input type="checkbox">
                                    <span> به خاطر سپردن  </span>
                                </label>
                                <a href="#" class="element-left">فراموشی رمز عبور</a>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">ورود</button>
                                <p class="margin-top-30 text-center">  حساب کاربری ندارید ؟ <a href="#">ثبت نام کنید</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @include('master.footer')
        </div>
        <!-- END WRAPPER -->
        @include('master.java')
    </div>
@endsection
{{--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<a href="#" data-toggle="modal" data-target="#login-modal">Login</a>

    <div class="modal-dialog">
        <div class="loginmodal-container">

            <h1>Login to Your Account</h1><br>
            <form method="post" action="login">

                <input type="text" name="email" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help">
                <a href="#">Register</a> - <a href="#">Forgot Password</a>
            </div>
        </div>
    </div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}
