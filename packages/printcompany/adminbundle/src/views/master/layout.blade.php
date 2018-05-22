<!DOCTYPE html>
<html lang="en" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('admin::master.css')

    @include('admin::master.java')

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    @include('admin::master.navbar')
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            @include('admin::master.sidebar')
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">


                <div class="breadcrumb-line">
                   @yield('pathOfSite')
                </div>
            </div>
            <!-- /page header -->


            @yield('content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<script src="{{asset('js/laroute.js')}}"></script>

<script type="text/javascript" src="{{asset('ad_theme/js/custom.js')}}"></script>
</body>

<!-- Mirrored from demo.interface.club/limitless/layout_1/RTL/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 May 2018 09:50:29 GMT -->
</html>
