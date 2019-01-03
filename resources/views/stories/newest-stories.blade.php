@extends('layouts.sub-layout')

@section('title', 'Truyện Mới Cập Nhật')

@section('sub-category', 'Truyện Mới Nhất')

@section('sub-sidebar')
    <a class="nav-link active" href="{{ route('newest.stories') }}">Mới Cập Nhật</a>
    <a class="nav-link" href="{{ route('finish.stories') }}">Đã Hoàn Thành</a>
@endsection

@section('sub-content')
    <ul class="books-list list-unstyled large-items">
        @foreach ($newestStories as $story)
            <li class="with-border">
                <a href="{{ route('detail.stories', $story->id) }}" class="book-img position-relative" target="_blank">
                    {!! Html::image(asset('image/stories/' . $story->image), $story->name, ['class' => 'zoom-me']) !!}
                </a>
                <div class="flex-primary">
                    <h3 class="book-title">
                        <a href="{{ route('detail.stories', $story->id) }}" target="_blank">
                            {{ $story->name }}
                        </a>
                    </h3>
                    <div class="book-desc line-clamp line-clamp-2">{{ $story->description }}</div>
                    <div class="small">
                        <a href="{{ route('detail.author', $story->author->id) }}" class="book-author mr-auto" target="_blank">
                            <i class="iconfont icon-write icon-18"></i> {{ $story->author->name }}
                        </a>
                    </div>
                    <ul class="tag-list tag-small list-unstyled mt-2">
                        <li class="tag red">
                            <a href="#" target="_blank">Còn tiếp...</a>
                        </li>
                        <li class="tag red">
                            <a title="" data-toggle="tooltip" data-original-title="Truyện cam đoan đảm bảo chất lượng">HQ</a>
                        </li>
                    </ul>
                    <ul class="tag-list tag-small list-unstyled mt-2">
                        <li class="tag gray">
                            <a href="{{ route('detail.category', $story->category->id) }}" target="_blank">
                                {{ $story->category->name }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="align-items-start">
                    <div class="d-flex">
                        <span class="badge-novel mr-1" data-toggle="tooltip" title=""
                              data-original-title="{{ $story->chaps()->count() }} Chương"
                        >
                            {{ $story->chaps()->count() }}
                            <i class="iconfont icon-layer" style="font-size: 18px;"></i>
                        </span>
                    </div>
                    <div class="d-flex mt-1">
                        <span class="badge-novel mr-1" data-toggle="tooltip" title=""
                              data-original-title="Cập nhật lúc {{ $story->created_at }}"
                        >
                            <time class="timeago align-middle" datetime="{{ $story->created_at }}"></time>
                            <i class="iconfont icon-time"></i>
                        </span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection

@section('sub-pagination')
    {{ $newestStories->links() }}
@endsection
