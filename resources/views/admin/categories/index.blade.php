@extends('layouts.admin.admin-layout')

@section('title', 'Bảng điều khiển')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Chủ đề</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button id="add-category" name="add-category" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Tên chủ đề</th>
                        <th>Mô tả</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="categories-list">
                    @foreach ($categories as $category)
                        <tr id="category{{$category->id}}">
                            <td>
                                <span class="label {{ ($loop->iteration % 2) != 0 ? 'label-default' : config('view.label.' . random_int(1,5))}}">
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td>
                                <p>{{ $category->description }}</p>
                            </td>
                            <td>
                                <button class="btn-edit-category" value="{{ $category->id }}" title="Sửa">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn-delete-category" value="{{ $category->id }}" title="Xóa">
                                    <i class="fa fa-train"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditCategory" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="edit-category">Thông tin chủ đề</h4>
                </div>
                <div class="modal-body">
                    <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category-name" name="name" value=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="description">Mô tả</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="category-description" name="description"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="save-category" value="add">Lưu</button>
                    <input type="hidden" id="category-id" name="category-id" value="{{ $category->id }}">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {!! Html::script(asset('js/admin/category.js')) !!}
@endsection
