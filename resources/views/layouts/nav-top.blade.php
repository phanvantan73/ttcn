<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-top">
    <div class="container">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link pl-0" href="{{ route('welcome') }}" title="TruyenYY">
                    <h1 style="font-size:11px; font-weight:inherit; font-family: inherit; margin:0; padding: 0; line-height: 40px;">
                        Đọc Truyện Online
                    </h1>
                </a>
            </li>
        </ul>

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
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        >
                            {{ __('Đăng xuất') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
