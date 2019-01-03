<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top navbar-top navbar-fancy">
    <div class="container">
        <a class="navbar-brand simple-logo" href="{{ route('welcome') }}">
            <strong>Truyện JK</strong>
        </a>
        <ul class="navbar-nav nav-fancy mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="dropdownGenresTopMenu">
                    Thể Loại
                </a>
                <div class="dropdown-menu multi-column" style="min-width: 500px;" aria-labelledby="dropdownGenresTopMenu">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-4">
                                <ul class="multi-column-dropdown">
                                    <li>
                                        <a href="{{ route('detail.category', $category->id) }}" class="dropdown-item">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('newest.stories') }}">Truyện mới</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('finish.stories') }}">Truyện hoàn thành</a>
            </li>
        </ul>
        <form class="form-inline search-box" action="#">
            <input class="form-control mr-1" type="search" placeholder="Tìm kiếm..." aria-label="Search" name="q" value="">
            <button class="btn btn-secondary" type="submit"><i class="iconfont icon-search icon-18"></i></button>
        </form>
        <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="iconfont icon-login icon-24"></i> Đăng Nhập
                    </a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="iconfont icon-register icon-24"></i> Đăng Ký Thành Viên
                        </a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            {{ __('Hồ sơ cá nhân') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            {{ __('Đăng xuất') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li class="nav-divider"></li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="iconfont icon-books"></i> Tủ Sách
                </a>
            </li>
        </ul>
    </div>
</nav>
