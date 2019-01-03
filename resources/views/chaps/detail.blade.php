@extends('layouts.chap-layout')

@section('title', $chap->story->name . ' - ' . $chap->name)

@section('chap-content')
    <h1 class="chapter-title">{{ $chap->name }}</h1>
    <ul class="list-info list-unstyled">
        <li>
            <a href="{{ route('detail.stories', $chap->story->id) }}" target="_blank">
                <i class="iconfont icon-book"></i> {{ $chap->story->name }}
            </a>
        </li>
        <li>
            <a href="{{ route('detail.author', $chap->story->author->id) }}" target="_blank">
                <i class="iconfont icon-pen"></i> {{ $chap->story->author->name }}
            </a>
        </li>
        <li>
            <i class="iconfont icon-time"></i> {{ $chap->created_at }}
        </li>
    </ul>
    <hr>

    <div class="inner" style="font-size: 1em; line-height: 1.7em;">
        <div>
            {!! $chapContent !!}
        </div>
    </div>
    {!! Form::hidden('', $chap->story->getIdPreChap($chap), ['id' => 'pre-chap']) !!}
    {!! Form::hidden('', $chap->story->getIdNextChap($chap), ['id' => 'next-chap']) !!}
@endsection
