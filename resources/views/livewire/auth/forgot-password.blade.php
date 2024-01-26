<div>
    @include('layouts.navbars.guest.login')
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h4 class="mb-0">
                                Nhập tên đăng nhập của bạn
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('quen-mat-khau.yeu-cau') }}" method="POST" onsubmit="loadingMasterPage()" role="form text-left">
                                @csrf
                                <div>
                                    <label for="email">Tên đăng nhập</label>
                                    <div>
                                        <input id="username" type="text" class="form-control" name="username"
                                               placeholder="username" aria-label="username" aria-describedby="email-addon">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                            class="btn bg-gradient-info w-100 mt-4 mb-0">
                                        Gửi yêu cầu
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
