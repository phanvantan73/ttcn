@extends('layouts.story-layout')

@section('title', $story->name)

@section('story-info')
    <a href="{{ route('show.chap', $firstChap->id) }}" class="cover position-relative" target="_blank">
        {!! Html::image(asset('image/stories/' . $story->image), null, ['class' => 'zoom-me']) !!}
    </a>
    <div class="info">
        <h1 class="name">
            {{ $story->name }}
        </h1>
        <h2 class="author">
            <a href="{{ route('detail.author', $story->author->id) }}" target="_blank">
                {{ $story->author->name }}
            </a>
        </h2>
        <ul class="tag-list list-unstyled mt-2">
            <li class="tag">
                <a href="{{ route('detail.category', $story->category->id) }}" target="_blank">
                    {{ $story->category->name }}
                </a>
            </li>
        </ul>
        <ul class="tag-list list-unstyled">
            <li class="tag red">
                <a href="#" target="_blank">
                    Còn tiếp...
                </a>
            </li>
        </ul>

        <div style="flex: 1;"></div>
        <ul class="numbers list-unstyled">
            <li>
                {{ $story->chaps->count() }} <small>Chương</small>
            </li>
            <li>
                <span class="num-format" title="" data-toggle="tooltip" data-original-title="{{ $story->users->count() }}">
                    {{ $story->users->count() }}
                </span>
                <small>Người đọc</small>
            </li>
        </ul>
        <div class="">
            <a href="{{ route('show.chap', $firstChap->id) }}" class="btn btn-primary" role="button" target="_blank">
                Đọc Từ Đầu
            </a>
            <a href="#" id="id_btn_bookmark" class="btn btn-outline-primary" role="button"
               data-toggle="tooltip" title="" data-original-title="Thêm Vào Tủ Sách"
            >
                <i class="iconfont icon-star-tag icon-18"></i>
            </a>
            <a href="#" id="id_btn_donate" class="btn btn-outline-success"
               data-toggle="tooltip" title="" role="button" data-original-title="Ủng Hộ Truyện Này"
            >
                <i class="iconfont icon-donate icon-18"></i>
            </a>
        </div>
    </div>
@endsection

@section('nav-tabs')
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('detail.stories', $story->id) }}" id="intro">
            Giới Thiệu
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ route('get.list.chaps', $story->id) }}" id="list-chaps">
            Danh Sách Chương
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="#" id="'comment">
            Bình Luận <span class="badge badge-primary num-format">405</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" target="_blank" id="support">
            Đề Cử <span class="badge badge-warning num-format">19</span>
        </a>
    </li>
@endsection

@section('left-col')
    <section class="section intro" id="id_novel_summary" style="height: 400px; overflow-y: scroll;">
        {{ $story->description }}
    </section>
    <section class="book-state">
        <ul class="list-unstyled">
            <li>
                <div class="label">Mới Cập Nhật</div>
                <div class="detail">
                    @forelse ($newUpdateChaps as $chap)
                        <div class="mb-2 d-flex">
                            <a href="{{ route('show.chap', $chap->id) }}" target="_blank" class="flex-primary">
                                {{ $chap->name }}
                            </a>
                            <time class="timeago" datetime="{{ $chap->created_at }}" data-toggle="tooltip" title="" data-original-title="{{ $chap->created_at }}"></time>
                        </div>
                    @empty
                    @endforelse
                </div>
            </li>
        </ul>
    </section>
    <section class="like-more-list">
        <h3 class="section-heading">Có Thể Bạn Cũng Muốn Đọc</h3>
        <ul class="list-unstyled">
            @forelse ($story->category->stories as $st)
                @if ($loop->iteration <= 6)
                    @if ($st->id != $story->id)
                        <li class="list-item">
                            <a href="{{ route('detail.stories', $st->id) }}" target="_blank">
                                <div class="cover">
                                    {!! Html::image(asset('image/stories/' . $st->image), null, ['class' => 'zoom-me']) !!}
                                </div>
                                <h4 class="line-clamp line-clamp-2 title-font">{{ $st->name }}</h4>
                            </a>
                            <a href="{{ route('detail.author', $st->author->id) }}" target="_blank">
                                <div class="small">{{ $st->author->name }}</div>
                            </a>
                        </li>
                    @endif
                @endif
            @empty
            @endforelse
        </ul>
    </section>
@endsection

@section('right-col')
    <section class="right-widget author-box">
        <a href="{{ route('detail.author', $story->author->id) }}" class="author-picture" target="_blank">
            {!! Html::image(asset('image/avatar/authors/' . $story->author->image)) !!}
        </a>
        <h3 class="author-name">
            <a href="{{ route('detail.author', $story->author->id) }}" target="_blank">
                {{ $story->author->name }}
            </a>
        </h3>
        <hr>
        <div class="d-flex author-ref">
            <a href="{{ route('detail.author', $story->author->id) }}" target="_blank">
                <i class="iconfont icon-book"></i>
                <p>{{ $story->author->stories->count() }} Truyện</p>
            </a>
        </div>
        <hr>
        <h4>Tác Phẩm Cùng Tác Giả
            <a href="{{ route('detail.author', $story->author->id) }}" target="_blank">
                <i class="iconfont icon-right icon-14"></i>
            </a>
        </h4>
        <div class="author-relating">
            @forelse ($story->author->stories as $st)
                <hr>
                <a href="{{ route('detail.stories', $st->id) }}" class="cover" target="_blank">
                    {!! Html::image(asset('image/stories/' . $st->image), null, ['class' => 'zoom-me']) !!}
                </a>
                <h5 class="novel-name">
                    <a href="{{ route('detail.stories', $st->id) }}" target="_blank">
                        {{ $st->name }}
                    </a>
                </h5>
                <div class="excerpt">
                    {{ $st->description }}
                </div>
                <a href="{{ route('detail.stories', $st->id) }}" class="btn btn-primary mt-2" target="_blank">
                    Xem Ngay
                </a>
                <hr>
            @empty
            @endforelse
        </div>
    </section>
@endsection
