<div>
    @include('layouts.navbars.guest.login')
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <p class="mb-0">
                                Nhập tên đăng nhập của bạn và mật khẩu mới
                            <p>
                        </div>
                        <div class="card-body">

                            <form wire:submit.prevent="resetPassword" action="#" method="POST" role="form text-left">
                                <div>
                                    <label for="email">Tên đăng nhập</label>
                                    <div class="@error('username')border border-danger rounded-3 @enderror mb-3">
                                        <input wire:model="username" id="username" type="text" class="form-control"
                                               autocomplete="off" required minlength="4"
                                               placeholder="Nhập vào tên đăng nhập" aria-label="username"
                                               aria-describedby="email-addon">
                                    </div>
                                    @error('username')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <label for="password">Mật khẩu</label>
                                    <div class="@error('password')border border-danger rounded-3 @enderror mb-3">
                                        <input wire:model="password" id="password" type="password" class="form-control"
                                               autocomplete="off" required minlength="6"
                                               placeholder="Nhập vào mật khẩu mới" aria-label="Password"
                                               aria-describedby="password-addon">
                                    </div>
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <label for="passwordConfirmation">Xác nhận mật khẩu</label>
                                    <div
                                        class="@error('passwordConfirmation')border border-danger rounded-3 @enderror mb-3">
                                        <input wire:model="passwordConfirmation" id="passwordConfirmation" type="password"
                                               autocomplete="off" required minlength="6"
                                               class="form-control" placeholder="Nhập lại mật khẩu mới"
                                               aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    @error('passwordConfirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                            class="btn bg-gradient-info w-100 mt-4 mb-0">Đổi mật khẩu
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                             style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
