<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-main navbar-fancy mt-3"
     id="site_main_nav" style="z-index: auto; position: relative; top: 0px;"
>
    <div class="container">
        <ul class="navbar-nav nav-fancy mr-auto">
            <li class="nav-item active">
                <a class="nav-link px-3" href="{{ route('welcome') }}" title="Trang Chủ">
                    <i class="iconfont icon-home"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('finish.stories') }}" title="Truyện Hoàn Thành" target="_blank">
                    Truyện hoàn thành
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('newest.stories') }}" title="Truyện Mới Cập Nhật" target="_blank">
                    Truyện mới
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" title="Diễn Đàn Thảo Luận Truyện">
                    Diễn Đàn
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#" target="_blank"><i class="iconfont icon-help"></i> Hướng Dẫn</a>
            </li>
        </ul>
    </div>
</nav>
