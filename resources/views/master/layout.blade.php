<!DOCTYPE html>
<html lang="fa" class="fullscreen-bg" >
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
</div>
</body>
</html>
</div>
</div>
