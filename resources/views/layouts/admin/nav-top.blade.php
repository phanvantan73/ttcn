<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a  class="navbar-brand" href="{{ route('dashboard') }}">
            Bảng điều khiển
        </a>
    </div>

    <div class="notifications-wrapper">
        <ul class="nav">
            <li>
                <a href="#"><i class="fa fa-user-plus"></i> Hồ sơ cá nhân</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Đăng xuất
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
