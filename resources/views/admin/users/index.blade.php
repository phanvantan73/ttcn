@extends('layouts.admin.admin-layout')

@section('title', 'Bảng điều khiển')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Người dùng</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Phân quyền</th>
                        <th>Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>
                                <span class="label {{ ($loop->iteration % 2) != 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $user->name }}
                                </span>
                            </th>
                            <th>
                                <span class="label {{ ($loop->iteration % 2) != 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $user->email }}
                                </span>
                            </th>
                            <th>
                                <span class="label {{ ($loop->iteration % 5) == 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ ($user->is_admin == 1) ? 'Administrator' : 'Nomal user' }}
                                </span>
                            </th>
                            <th>
                                <span class="label {{ ($loop->iteration % 5) == 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $user->created_at }}
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
