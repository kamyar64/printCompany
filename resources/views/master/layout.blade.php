<!DOCTYPE html>
<html lang="fa" class="fullscreen-bg" dir="rtl" >
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Description">
    <meta name="author" content="Kamyar">
    @include('master.css')
</head>
<body @if(Request::is('login'))  class="layout-full" @endif >
@include('master.navbar')
<!-- WRAPPER -->
<div id="wrapper">
    @yield('content')
    @if(!Request::is('login'))
    @include('master.footer')
    @endif
</div>
@include('master.java')
@if(Session::has('add_to_cart_with_success'))
    <script>
        toastr.success('{{ Session::get('add_to_cart_with_success') }}')
    </script>
@endif
@if(Session::has('remove_from_cart_with_success'))
    <script>
        toastr.error('{{ Session::get('remove_from_cart_with_success') }}')
    </script>
@endif
</body>
</html>

