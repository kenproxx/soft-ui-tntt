<nav
    class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-between" id="navigation">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('dashboard') }}">
                Quản trị Thiếu Nhi Thánh Thể
            </a>
            <ul class="navbar-nav">
                @if (auth()->user())
                    <li class="nav-item">
                        <a class="nav-link text-dark d-flex align-items-center me-2 active" aria-current="page"
                           href="{{ route('dashboard') }}">
                            <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark me-2" href="{{ route('profile') }}">
                            <i class="fa fa-user opacity-6 text-dark me-1"></i>
                            Profile
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-dark me-2 text-dark" onclick="loadingMasterPage()"
                       href=" {{ auth()->user() ? route('static-sign-up') : route('sign-up') }}">
                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                        Đăng ký
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark me-2" onclick="loadingMasterPage()" href="{{ auth()->user() ? route('sign-in') : route('login') }}">
                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                        Đăng nhập
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
