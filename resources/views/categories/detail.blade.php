@extends('layouts.category-layout')

@section('title', 'Truyện theo chủ đề')

@section('category-name', $category->name)

@section('category-info')
    <div class="main-col">
        <ul class="top-books">
            @forelse ($stories as $story)
                <li id="gt-165716">
                    <div class="inner">
                        <div class="book-shadow"></div>
                        <div class="img-box">
                            <a href="{{ route('detail.stories', $story->id) }}" target="_blank">
                                {!! Html::image(asset('image/stories/' . $story->image), $story->name) !!}
                            </a>
                        </div>
                        <h3 class="line-clamp line-clamp-2">
                            <a href="{{ route('detail.stories', $story->id) }}" title=""
                               data-toggle="tooltip" target="_blank"
                               data-original-title="{{ $story->name }} - {{ $story->author->name }}"
                            >
                                {{ $story->name }}
                            </a>
                        </h3>
                        <p class="short-intro line-clamp line-clamp-2">"{{ $story->description }}"</p>
                    </div>
                </li>
            @empty
            @endforelse

        </ul>

    </div>
    <div class="sidebar-col" style="height: 315.5px; overflow: hidden;">
        <div class="card height-max">
            <article class="card-body dancing-font page-excerpt"><p>{{ $category->description }}</p></article>
        </div>
    </div>
@endsection

@section('new-update-category')
    <h2 class="section-title">
        Truyện {{ $category->name}} Mới Cập Nhật
        <a href="{{ route('all.stories.of.category', $category->id) }}" title="Danh Sách Đầy Đủ" class="card-more" target="_blank">
            <i class="iconfont icon-right icon-14"></i>
        </a>
    </h2>
    <ul class="books-list list-unstyled">
        @forelse ($newestStories as $story)
            <li>
                <a href="{{ route('detail.stories', $story->id) }}" class="book-img" target="_blank">
                    {!! Html::image(asset('image/stories/' . $story->image), null, ['class' => 'zoom-me']) !!}
                </a>
                <div class="flex-primary">
                    <h3 class="book-title">
                        <a href="{{ route('detail.stories', $story->id) }}" target="_blank">{{ $story->name }}</a>
                    </h3>
                    <div class="book-desc line-clamp line-clamp-2">
                        {{ $story->description }}
                    </div>
                    <div class="d-flex small mt-2">
                        <a href="{{ route('detail.author', $story->author->id) }}" class="book-author mr-auto" target="_blank">
                            <i class="iconfont icon-write icon-18"></i> {{ $story->author->name }}
                        </a>
                        <span class="badge-genre mr-1">{{ $story->chaps->count() }} C</span>
                    </div>
                    <div class="small">
                        <i class="iconfont icon-time icon-14 align-middle"></i>
                        <time class="timeago" datetime="{{ $story->created_at }}"></time>
                    </div>
                </div>
            </li>
        @empty
        @endforelse
    </ul>
    <a href="{{ route('all.stories.of.category', $category->id) }}"
       class="btn btn-outline-primary btn-sm float-right" target="_blank"
    >
        <i class="iconfont icon-list"></i>
        Danh Sách Đầy Đủ
    </a>
@endsection

@section('more-reading-in-week')
    <div class="section-grid ranking-heading">
        <h3 class="section-title sm mb-2">Truyện {{ $category->name }} Đọc Nhiều</h3>
        <ul class="heading-list list-unstyled">
            @forelse ($moreReadingStories as $story)
                @if ($loop->iteration == 1)
                <li class="no1">
                    <span class="num num1">{{ $loop->iteration }}</span>
                    <div class="info">
                        <a href="{{ route('detail.stories', $story->id) }}" class="name" target="_blank">{{ $story->name }}</a>
                        <div class="d-flex">
                            <span class="count num-format mr-2">{{ $story->users->count() }}</span>
                            <a href="{{ route('detail.author', $story->author->id) }}" class="count mr-2" target="_blank">
                                {{ $story->author->name }}
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('detail.stories', $story->id) }}" class="cover" target="_blank">
                        {!! Html::image(asset('image/stories/' . $story->image), $story->name) !!}
                    </a>
                </li>
                @else
                    <li>
                        <span class="num num10">{{ $loop->iteration }}</span>
                        <a href="{{ route('detail.stories', $story->id) }}" class="name" target="_blank">{{ $story->name }}</a>
                        <span class="count num-format">{{ $story->users->count() }}</span>
                    </li>
                @endif
            @empty
            @endforelse
        </ul>
    </div>
@endsection
