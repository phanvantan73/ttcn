@extends('layouts.story-layout')

@section('title', 'Tác giả - ' . $author->name)

@section('story-info')
    <a href="{{ route('detail.author', $author->id) }}" class="cover position-relative" target="_blank">
        {!! Html::image(asset('image/avatar/authors/' . $author->image), null, ['class' => 'zoom-me']) !!}
    </a>
    <div class="info">
        <h1 class="name">
            Tên: {{ $author->name }}
        </h1>
        <h2 class="author">
            <a href="javascript:" target="_blank">
            Số điện thoại: {{ $author->phone }}
            </a>
        </h2>
        <ul class="tag-list list-unstyled mt-2">
            <li class="tag">
                <a href="#" target="_blank">
                Địa chỉ: {{ $author->address }}
                </a>
            </li>
        </ul>
        <ul class="numbers list-unstyled">
            <li>
            Số truyện sáng tác: {{ $author->stories->count() }} <small> Truyện</small>
            </li>
        </ul>
        <div class="">
            <a href="#" id="id_btn_bookmark" class="btn btn-outline-primary" role="button"
               data-toggle="tooltip" title="" data-original-title="Yêu Thích Tác Giả"
            >
                <i class="iconfont icon-love icon-18"></i>
            </a>
            <a href="#" id="id_btn_donate" class="btn btn-outline-success"
               data-toggle="tooltip" title="" role="button" data-original-title="Ủng Hộ Tác Giả"
            >
                <i class="iconfont icon-donate icon-18"></i>
            </a>
        </div>
    </div>
@endsection

@section('left-col')

    <section class="like-more-list">
        <h3 class="section-heading">Những Truyện Đã Sáng Tác</h3>
        <ul class="list-unstyled">
            @forelse ($author->stories as $story)
                @if ($loop->iteration <= 6)
                    <li class="list-item">
                        <a href="{{ route('detail.stories', $story->id) }}" target="_blank">
                            <div class="cover">
                                {!! Html::image(asset('image/stories/' . $story->image), null, ['class' => 'zoom-me']) !!}
                            </div>
                            <h4 class="line-clamp line-clamp-2 title-font">{{ $story->name }}</h4>
                            <div class="small">{{ $story->author->name }}</div>
                        </a>
                    </li>
                @endif
            @empty
            @endforelse
        </ul>
    </section>
@endsection

@section('right-col')
    <div class="card height-max">
        <article class="card-body dancing-font page-excerpt">
            <p>{{ $author->description }}</p>
        </article>
    </div>
@endsection
