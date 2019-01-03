@extends('layouts.admin.admin-layout')

@section('title', 'Bảng điều khiển')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Truyện</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button id="add-story" name="add-story" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên truyện</th>
                        <th>Mô tả</th>
                        <th>Số chương</th>
                        <th>Chủ đề</th>
                        <th>Tác giả</th>
                        <th>Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($stories as $story)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>
                                <span class="label {{ ($loop->iteration % 2) != 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $story->name }}
                                </span>
                            </th>
                            <th>
                                <p>{{ $story->description }}</p>
                            </th>
                            <th>
                                <span class="label {{ ($loop->iteration % 5) == 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $story->num_of_chaps }}
                                </span>
                            </th>
                            <th>
                                <span class="label {{ ($loop->iteration % 5) == 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $story->category->name }}
                                </span>
                            </th>
                            <th>{{ $story->author->name }}</th>
                            <th>
                                <span class="label {{ ($loop->iteration % 5) == 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $story->created_at }}
                                </span>
                            </th>
                            <th>
                                <a href="javascript:" title="Sửa" data-toggle="modal" data-target="#modalEditCategory">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:" title="Xóa" data-toggle="modal" data-target="#modalDeleteCategory">
                                    <i class="fa fa-train"></i>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
