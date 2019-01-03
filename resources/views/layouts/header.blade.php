<header class="container mt-3 site-header">
    <div class="d-flex">

        <a href="{{ route('welcome') }}" class="site-logo">
            {{ Html::image(asset('image/logo.png'), __('Truyện JK logo'), ['height' => 40]) }}
        </a>

        <div id="search_box_root" class="search">
            <input type="hidden" name="q" value="">
            <div class="input-group">
                <div class="rbt clearfix open" tabindex="-1" style="position: relative;">
                    <div class="rbt-input-hint-container" style="position: relative;">
                        <input name="search-txt" id="search-txt"
                           placeholder="Tìm tên truyện, tác giả..."
                           class="rbt-input-main form-control rbt-input " type="text" value=""
                        />
                        <div id="search-result">
                        </div>
                    </div>
                </div>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="iconfont icon-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <a class="btn btn-outline-primary" href="#" role="button">
            <i class="iconfont icon-books icon-24"></i> Tủ Sách
        </a>
    </div>
</header>
