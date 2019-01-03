@extends('layouts.master')

@section('focus-box')
    <div class="d-flex">
        <div class="col-left">
            <div class="wrapper">
                @forelse ($categories as $category)
                    <a href="{{ route('detail.category', $category->id) }}" class="col-6 genre" target="_blank">
                        <i class="yyicon {{ $category->icon ?? 'icon-moon' }}"></i>
                        <div class="info">
                            <span class="name">{{ $category->name }}</span>
                            <span class="num">{{ $category->stories->count() }}</span>
                        </div>
                    </a>
                    <button type="button" class="show-all" data-toggle="modal" data-target="#genresModal">
                        <i class="iconfont icon-more"></i>
                    </button>
                @empty
                @endforelse
            </div>
        </div>
        <div class="col-center">
            <div id="carouselDesktopIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($newestStories as $story)
                        <li data-target="#carouselDesktopIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                            {{ $story->name }}
                        </li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($newestStories as $story)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            {!! Html::image(asset('image/stories/carousel/' . $story->carousel), $story->name, ['class' => 'd-block w-100']) !!}
                            <div class="carousel-caption d-none d-md-block">
                                <p>
                                    <a href="{{ route('detail.stories', $story->id) }}" class="btn btn-primary" target="_blank">Xem Thử</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselDesktopIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselDesktopIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-right">
            <i class="iconfont icon-info text-muted" style="font-size: 18px; float: left; margin-right: 5px;"></i>
            <h3>
                Bạn muốn tăng thêm thu nhập bằng nghề dịch truyện?
            </h3>
            <div>
                <p>
                    Truyện JK Giới với hàng <strong>trăm vạn</strong> độc giả thường xuyên ghé thăm, cùng các độc giả
                    <strong>VIP </strong>tiềm năng luôn ủng hộ truyện và các nhóm dịch.
                    Truyện JK luôn đảm bảo doanh thu cho dịch giả với tỷ lệ chia sẻ doanh thu cao nhất lên đến 7
                    <strong>5%&nbsp;</strong>dành cho các dịch giả, tác giả.
                </p>
            </div>
            <p>
                <a href="#" target="_blank">
                    Tìm Hiểu Thêm <i class="iconfont icon-right icon-8"></i>
                </a>
            </p>
        </div>
    </div>
@endsection

@section('editor')
    <div class="col-left">
        <div class="card nude">
            <h3 class="card-header">
                Truyện Mới
                <a href="{{ route('newest.stories') }}" target="_blank" title="Danh Sách Đầy Đủ" class="card-more">
                    <i class="iconfont icon-right icon-14"></i>
                </a>
            </h3>
            <ul class="list-unstyled heading-list">
                @foreach ($newUpdateStories as $story)
                    <li id="top-week-novel-18871">
                        <div class="d-flex">
                            <a href="{{ route('detail.stories', $story->id) }}" class="name" target="_blank">
                                {{ $story->name }}
                            </a>
                            <a href="{{ route('detail.category', $story->category->id) }}" class="genre" target="_blank">
                                {{ $story->category->name }}
                            </a>
                        </div>
                        <div class="d-flex">
                            <a class="author" href="{{ route('detail.author', $story->author->id) }}" target="_blank">
                                {{ $story->author->name }}
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="card-body py-0 px-3 mb-2 mt-auto">
                <a href="{{ route('newest.stories') }}" class="small" target="_blank">
                    Xem Thêm <i class="iconfont icon-right icon-8"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-right">
        <div class="card nude">
            <h3 class="card-header">
                Truyện Hoàn Thành
            </h3>
            <div class="row">
                @foreach ($finishStories as $story)
                <div class="col-6">
                    <div class="novel-item">
                        <a href="{{ route('detail.stories', $story->id) }}" class="cover book-shadow" target="_blank">
                            {!! Html::image(asset('image/stories/' . $story->image), null, ['class' => 'zoom-me']) !!}
                        </a>
                        <div class="info">
                            <h4>
                                <a href="{{ route('detail.stories', $story->id) }}" target="_blank">
                                    {{ $story->name }}
                                </a>
                            </h4>
                            <div>
                                <a href="{{ route('detail.author', $story->author->id) }}" class="author" target="_blank">
                                    {{ $story->author->name }}
                                </a>
                            </div>
                            <span class="stat text-primary">{{ $story->users->count() }} <small>Người Đọc</small></span>
                            <blockquote class="desc">
                                {{ $story->description }}
                            </blockquote>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('ranking')
    <div class="row">
        @foreach ($categories as $category)
            @if ($category->stories->count())
                <div class="col-3">
                    <div class="card nude" id="id-top-genre-6">
                        <h3 class="card-header">
                            {{ $category->name }}
                            <a href="{{ route('detail.category', $category->id) }}" target="_blank" class="card-more">
                                <i class="iconfont icon-right icon-14"></i>
                            </a>
                            {!! Html::image(asset('image/categories/' . ($category->svg ?? 'bolt.svg')), $category->name, ['class' => 'card-icon']) !!}
                        </h3>
                        <ul class="heading-list list-unstyled">
                            @foreach ($category->stories as $story)
                                <li>
                                    <span class="num num1">{{ $loop->iteration }}</span>
                                    <a href="{{ route('detail.stories', $story->id) }}" class="name" target="_blank">
                                        {{ $story->name }}
                                    </a>
                                    <span class="count"><span class="num-format">{{ $story->users->count() * 1000 }}</span></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection

@section('last-update')
    <div class="row">
        <div class="col-12">
            <div class="card nude">
                <h3 class="card-header">
                    Truyện Mới Cập Nhật
                    <a href="{{ route('newest.stories') }}" class="card-more" target="_blank">
                        <i class="iconfont icon-right icon-14"></i>
                    </a>
                </h3>
                <table class="table table-sm table-striped">
                    <tbody>
                    @foreach ($newChaps->unique('story_id') as $chap)
                        <tr>
                            <td class="genre">
                                <a href="{{ route('detail.category', $chap->story->category->id) }}" target="_blank">
                                    {{ $chap->story->category->name }}
                                </a>
                            </td>

                            <td class="novel-name">
                                <a href="{{ route('detail.stories', $chap->story->id) }}" target="_blank">
                                    {{ $chap->story->name }}
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('show.chap', $chap->id) }}" target="_blank">
                                    {{ $chap->name }}
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('detail.author', $chap->story->author->id) }}" target="_blank">
                                    {{ $chap->story->author->name }}
                                </a>
                            </td>

                            <td><time class="timeago" datetime="{{ $chap->created_at }}"></time></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
