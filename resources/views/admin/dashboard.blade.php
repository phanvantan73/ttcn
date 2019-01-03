@extends('layouts.admin.admin-layout')

@section('title', 'Bảng điều khiển')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Bảng điều khiển</h1>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-one">
                <a href="#">
                    <span class="glyphicon glyphicon-bell"></span>
                    <h5>{{ $categories->count() }} Chủ để</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-two">
                <a href="#">
                    <span class="glyphicon glyphicon-book"></span>
                    <h5>{{ $stories->count() }} Truyện</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-three">
                <a href="#">
                    <span class="glyphicon glyphicon-leaf"></span>
                    <h5>{{ $authors->count() }} Tác giả</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-four">
                <a href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <h5>{{ $users->count() }} Người dùng</h5>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-sm-5">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên tác giả</th>
                        <th>Số điện thoại</th>
                        <th>Số truyện sáng tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>
                                <span class="label {{ ($loop->iteration % 2) != 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $author->name }}
                                </span>
                            </th>
                            <th>
                                <span class="label {{ ($loop->iteration % 3) == 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $author->phone }}
                                </span>
                            </th>
                            <th>
                                <span class="label {{ ($loop->iteration % 5) == 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $author->stories->count() }}
                                </span>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-7 col-sm-7">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Thông báo</h4>
                    <p class="list-group-item-text" style="line-height: 30px;">
                        ghi chú ngày 28/12/2018 : dạo này ta hơi bận hay khất chương, từ ngày mai ta sẽ viết đều lại.
                    </p>
                </a>
            </div>
            <h2>Người dùng mới đăng ký</h2>

            @foreach ($newRegisterUsers as $user)
            <div class="media">
                <a class="media-left" href="#">
                    {!! Html::image(asset('image/avatar/users/' . $user->profile->avatar), null, ['class' => 'img-rounded']) !!}
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{ $user->name }}
                        <small>{{ $user->profile->gender }}</small>
                    </h4>
                    <small class="label label-info">Địa chỉ:</small> {{ $user->profile->address }}
                    <br>
                    <small class="label label-success">Cách đây:</small>
                    <time class="timeago" datetime="{{ $user->created_at }}"></time>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
