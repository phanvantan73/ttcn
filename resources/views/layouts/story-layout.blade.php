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
    <body>

        @include('layouts.nav-top')

        @include('layouts.header')

        @include('layouts.nav-main')

        <div class="container novel-detail">
            <div class="novel-info">
                @yield('story-info')
            </div>

            <ul class="nav nav-tabs mt-3">
                @yield('nav-tabs')
            </ul>

            <div class="d-flex">
                <div class="left-col">
                    @yield('left-col')
                </div>

                <div class="right-col">
                    @yield('right-col')
                </div>
            </div>
        </div>

        @include('layouts.footer')

        @section('js')
            @include('layouts.js-file')
        @show
    </body>
</html>
