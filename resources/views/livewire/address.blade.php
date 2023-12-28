<main class="main-content">
    <div class="container-fluid py-4">
        {{-- Tables --}}
        <form action="{{ route('address.store') }}" method="POST" role="form text-left">
            @csrf
            <div class="mb-3">
                <label for="email">Tên đăng nhập</label>
                <div class="border border-danger rounded-3 ">
                    <input id="username" type="username" class="form-control"
                           placeholder="username" aria-label="username"
                           aria-describedby="email-addon">
                </div>
            </div>
            <div class="mb-3">
                <label for="password">Mật khẩu</label>
                <div class="border border-danger rounded-3 ">
                    <input id="password" type="password" class="form-control"
                           placeholder="Password" aria-label="Password"
                           aria-describedby="password-addon">
                </div>
            </div>
            <div class="form-check form-switch">
                <input  class="form-check-input" type="checkbox"
                       id="rememberMe">
                <label class="form-check-label" for="rememberMe">{{ __('Remember me') }}</label>
            </div>
            <div class="text-center">
                <button type="submit"
                        class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Sign in') }}</button>
            </div>
        </form>
    </div>
</main>
