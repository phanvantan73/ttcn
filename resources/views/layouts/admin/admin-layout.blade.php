<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Trang Quản Lý')</title>

        <meta name="description" content="Ứng dụng đọc truyện chữ online với nhiều thể loại.">

        @section('css')
            @include('layouts.admin.css')
        @show
    </head>
    <body>
        <div id="wrapper">
            @include('layouts.admin.nav-top')
            <!-- /. NAV TOP  -->
            @include('layouts.admin.nav-menu')
            <!-- /. SIDEBAR MENU (navbar-side) -->
            <div id="page-wrapper" class="page-wrapper-cls">
                <div id="page-inner">
                    @yield('content')
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        @include('layouts.admin.footer')
        <!-- /. FOOTER  -->
        @section('js')
            @include('layouts.admin.js-file')
        @show
    </body>
</html>
