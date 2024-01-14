<section>
    <div class="page-header section-height-75" style="height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-body">
                            <form wire:submit.prevent="login" action="#" method="POST" role="form text-left">
                                <div class="mb-3">
                                    <label for="email">Tên đăng nhập</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input wire:model="username" id="username" type="username" class="form-control"
                                               placeholder="username" aria-label="username"
                                               aria-describedby="email-addon">
                                    </div>
                                    @error('username')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">Mật khẩu</label>
                                    <div class="@error('password')border border-danger rounded-3 @enderror">
                                        <input wire:model="password" id="password" type="password" class="form-control"
                                               placeholder="Password" aria-label="Password"
                                               aria-describedby="password-addon">
                                    </div>
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-check form-switch">
                                    <input wire:model="remember_me" class="form-check-input" type="checkbox"
                                           id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                    Ghi nhớ đăng nhập
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                            class="btn bg-gradient-info w-100 mt-4 mb-0">
                                    Đăng nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <small class="text-muted">
                                Bạn quên mật khẩu? Nhấn vào đây
                                <a
                                    href="{{ route('forgot-password') }}"
                                    class="text-info text-gradient font-weight-bold">đây</a></small>
                            <p class="mb-4 text-sm mx-auto">
                                Không có tài khoản?
                                <a href="{{ route('sign-up') }}"
                                   class="text-info text-gradient font-weight-bold">
                                Đăng ký ngay
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class=" bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                             style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
