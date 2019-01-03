<!DOCTYPE html>

<html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Cộng Đồng Đọc Truyện Chữ')</title>

        <meta name="description" content="Ứng dụng đọc truyện chữ online với nhiều thể loại.">

        @section('css')
            @include('layouts.css')
        @show
    </head>
    <body class="page-fix-nav-top">

        @include('layouts.sub-nav-top')

        <div class="featured-cover" style="background-image: url({{ URL::asset('image/sub-bg.jpg') }}); min-height: 240px; background-position-y: bottom;">
            <div class="container">
                <h1 class="text-center display-4 text-warning">
                    @yield('sub-category')
                </h1>
                <h2 class="text-center text-warning">
                    Những truyện dịch, truyện convert chất lượng cao,
                    cung cấp cho người đọc những trải nghiệm tuyệt vời nhất
                </h2>
            </div>
        </div>

        <div class="novel-list mt-4">
            <div class="sidebar-col mr-4">
                <div class="nav flex-column nav-pills nav-tables" aria-orientation="vertical" id="sidebar_nav" style="z-index: 999;">
                    @yield('sub-sidebar')
                </div>
                <div></div>
            </div>

            <div class="main-col mr-0">

                <section class="section-grid">
                    @yield('sub-content')
                </section>

                @yield('sub-pagination')
            </div>
        </div>

        @include('layouts.footer')

        @section('js')
            @include('layouts.js-file')
        @show
    </body>
</html>
