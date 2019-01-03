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

        <div class="featured-cover" style="background-image: url({{ URL::asset('image/category-bg.jpg') }}); min-height: 240px; background-position-y: bottom;">
            <div class="container">
                <h1 class="text-center display-4 text-warning">
                    Truyện @yield('category-name')
                </h1>
            </div>
        </div>

        <div class="novel-list mt-4">
            @yield('category-info')
        </div>

        <div class="novel-list mt-4">
            <div class="main-col mr-0">

                <section class="section-grid">
                    @yield('new-update-category')
                </section>

            </div>

            <div class="sidebar-col mr-4">
                @yield('more-reading-in-week')
            </div>
        </div>

        <div class="novel-list mt-4">
            <div class="main-col mr-0">

                <section class="section-grid">
                    @yield('full-stories-of-category')
                </section>

            </div>

            <div class="sidebar-col mr-4">
                @yield('top-full-stories')
            </div>
        </div>

        @include('layouts.footer')

        @section('js')
            @include('layouts.js-file')
        @show
    </body>
</html>
