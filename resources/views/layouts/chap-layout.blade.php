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

        <div class="container chapter-detail">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('welcome') }}" target="_blank">Trang Chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('detail.stories', $chap->story->id) }}" target="_blank">{{ $chap->story->name }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $chap->name }}
                    </li>
                </ol>
            </nav>

            <div class="wiki-content bg1 w1140" id="id_chap_content">
                @yield('chap-content')
            </div>

            <div class="buttons text-center my-3">
                <a href="{{ route('show.chap', $chap->story->getIdPreChap($chap)) }}" role="button"
                   class="btn btn-secondary btn-lg {{ $chap->is_begin == 1 ? 'disabled' : '' }}"
                   data-toggle="tooltip" title="" data-original-title="[A]" id="btn-pre-chap"
                >
                    <i class="iconfont icon-left"></i> Chương Trước
                </a>
                <a href="{{ route('show.chap', $chap->story->getIdNextChap($chap)) }}" role="button"
                   class="btn btn-primary btn-lg {{ $chap->is_end == 1 ? 'disabled' : '' }}"
                   data-toggle="tooltip" title="" data-original-title="[D]" id="btn-next-chap"
                >
                    Chương Tiếp Theo <i class="iconfont icon-right"></i>
                </a>
            </div>
        </div>

        <div class="config-buttons right">
            <a tabindex="0" role="button" id="id_btn_bookmark">
                <i class="iconfont icon-star-tag-empty icon-24 text-success"></i>
            </a>
            <a tabindex="0" role="button" id="id_btn_love">
                <i class="iconfont icon-love icon-24 text-danger"></i>
            </a>

            <a tabindex="0" role="button" id="id_btn_top" data-toggle="tooltip"
               data-placement="left" title="" data-original-title="Lên Đầu [W]"
            >
                <i class="iconfont icon-top icon-24"></i>
            </a>
            <a tabindex="0" role="button" id="id_btn_bottom" data-toggle="tooltip"
               data-placement="left" title="" data-original-title="Xuống Cuối [S]"
            >
                <i class="iconfont icon-bottom icon-24"></i>
            </a>
        </div>

        @include('layouts.footer')

        @section('js')
            @include('layouts.js-file')
        @show
    </body>
</html>
