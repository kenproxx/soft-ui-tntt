<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
    <div class="container">

        <div class="collapse navbar-collapse justify-content-between" id="navigation">
            <a class="navbar-brand d-flex flex-column font-weight-bolder ms-lg-0 ms-3 text-white"
               href="{{ route('dashboard') }}">
                Quản trị đoàn sinh
                <span>Thiếu Nhi Thánh Thể</span>
            </a>
            <ul class="navbar-nav ">
                @if (auth()->user())
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex align-items-center me-2 active" aria-current="page"
                           href="{{ route('dashboard') }}">
                            <i class="fa fa-chart-pie opacity-6  me-1"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white me-2" href="{{ route('profile') }}">
                            <i class="fa fa-user opacity-6  me-1"></i>
                            Thông tin cá nhân
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-white me-2"
                       href="{{ auth()->user() ? route('static-sign-up') : route('sign-up') }}">
                        <i class="fas fa-user-circle opacity-6  me-1"></i>
                        Đăng ký
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white me-2" href="{{ auth()->user() ? route('sign-in') : route('login') }}">
                        <i class="fas fa-key opacity-6  me-1"></i>
                        Đăng nhập
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
