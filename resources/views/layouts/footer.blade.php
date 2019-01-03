<footer class="site-footer">

    <div class="container mt-4">
        <ul class="list-inline links">
            <li class="list-inline-item"><a target="_blank" href="#">Giới Thiệu</a></li>
            <li class="list-inline-item"><a target="_blank" href="#">Liên Hệ</a></li>
            <li class="list-inline-item"><a target="_blank" href="#">Quy Định Riêng Tư</a></li>
            <li class="list-inline-item"><a target="_blank" href="#">Vấn Đề Bản Quyền</a></li>
        </ul>
    </div>

    <a href="#" class="back-top" style="display: none;"><i class="iconfont icon-top"></i></a>

    <hr>
    <div class="container">
        <div class="row pt-md">
            <div class="col-12">
                <a href="{{ route('welcome') }}">
                    {{ Html::image(asset('image/logo.png'), __('Truyện JK logo'), ['height' => 40]) }}
                </a>
                <div class="pb-1 ml-auto mr-auto small mt-2">
                    TruyenJK là một <strong>nền tảng nội dung số</strong> trên internet,
                    nơi thành viên có thể tự do xuất bản những
                    nội dung tiếng Việt như: Tiểu thuyết, light novel, truyện ngắn hoặc thơ văn khác. Với những chức
                    năng được cải tiến liên tục, TruyenJK sẽ
                    mang lại cho Tác giả, Dịch giả và Người đọc truyện những trải nghiệm tuyệt vời nhất.
                    Đừng ngại đăng ký tài khoản tại TruyenJK, chỉ mất 30s và
                    hoàn toàn miễn phí.
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-md-between py-4 mt-2 delimiter-top">
            <div class="col-md-6">
                <div class="copyright small font-weight-bold text-center text-md-left">
                    © 2018 Jake Lagger. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
