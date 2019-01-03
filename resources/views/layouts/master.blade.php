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

        <div class="container focus-box">
            @yield('focus-box')
        </div>

        <div class="container editor-featured mt-3">
            @yield('editor')
        </div>

        <div class="container ranking-heading mt-3">
            @yield('ranking')
        </div>

        <div class="container editor-featured last-update mt-3">
            @yield('last-update')
        </div>

        @include('layouts.genresModal')

        @include('layouts.footer')

        @section('js')
            @include('layouts.js-file')
        @show
    </body>
</html>
