<nav  class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    {!! Html::image(asset('image/avatar/users/' . Auth::user()->profile->avatar), null, ['class' => 'img-circle']) !!}
                </div>
            </li>

            <li>
                <a  href="#"><strong>{{ Auth::user()->name }}</strong></a>
            </li>

            <li>
                <a   href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Trang chủ</a>
            </li>

            <li>
                <a href="{{ route('category.index') }}"><i class="fa fa-apple"></i>Danh sách chủ đề</a>

            </li>

            <li>
                <a href="{{ route('story.index') }}"><i class="fa fa-book"></i>Danh sách truyện</a>

            </li>


            <li>
                <a href="{{ route('author.index') }}"><i class="fa fa-bolt"></i>Danh sách tác giả</a>
            </li>

            <li>
                <a href="{{ route('chap.index') }}"><i class="fa fa-dashcube"></i>Danh sách chương</a>
            </li>

            <li>
                <a href="{{ route('user.index') }}"><i class="fa fa-users"></i>Danh sách người dùng</a>
            </li>
        </ul>
    </div>
</nav>
