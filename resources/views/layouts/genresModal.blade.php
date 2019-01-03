<div class="modal fade" id="genresModal" tabindex="-1" role="dialog" aria-labelledby="genresModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="genresModalLabel">
                    Danh Sách Các Thể Loại Truyện
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        @forelse ($categories as $category)
                            <div class="col-md-3">
                                <div>
                                    <a href="{{ route('detail.category', $category->id) }}">
                                        {{ $category->name }} ({{ $category->stories()->count() }})
                                    </a>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
