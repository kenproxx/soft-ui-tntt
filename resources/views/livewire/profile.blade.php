<style>
    #profile-page .list-group li strong {
        line-height: 42px;
    }
</style>

<div class="main-content">
    <div class="page-header min-height-300 border-radius-xl"
         style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <form action="{{ route('profile.upload.avatar') }}" method="post" hidden="" enctype="multipart/form-data"
          id="avatarForm" onsubmit="loadingMasterPage()">
        @csrf
        <input type="file" id="avatarInput" name="avatar" accept="image/*" onchange="submitAvatarForm()">
    </form>
    <div class="card card-body blur shadow-blur mx-4 mt-n6">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ auth()->user()->avatar ? auth()->user()->avatar : asset('assets/img/logo-tntt.png') }}"
                         alt="..." class="w-100 border-radius-lg shadow-sm h-100 object-cover">
                    <a onclick="selectAvatar()"
                       class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                        <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                           title="Edit Image"></i>
                    </a>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->holy_name . ' ' . auth()->user()->name }}
                    </h5>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid py-4" id="profile-page">
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-sm-11 col-10 d-flex align-items-center">
                            <h6 class="mb-0">Thông tin cá nhân</h6>
                        </div>
                        <div class="col-sm-1 col-2 text-right">
                            <a onclick="changeModeEditThongTinCaNhan()" class="textThongTinCaNhan cursor-pointer">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Sửa"></i>
                            </a>
                            <a onclick="saveThongTinCaNhan()" class="d-none inputThongTinCaNhan cursor-pointer">
                                <i class="fas fa-check text-secondary text-sm" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Lưu"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Mã code:</strong> &nbsp;
                            <span>123</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Username:</strong> &nbsp;
                            <span>123</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Tên thánh:</strong> &nbsp;
                            <span class="textThongTinCaNhan">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinCaNhan" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Tên gọi:</strong> &nbsp;
                            <span class="textThongTinCaNhan">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinCaNhan" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Ngày sinh:</strong> &nbsp;
                            <span class="textThongTinCaNhan">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinCaNhan" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Giới tính:</strong> &nbsp;
                            <span class="textThongTinCaNhan">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinCaNhan" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Email:</strong> &nbsp;
                            <span class="textThongTinCaNhan">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinCaNhan" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Số điện thoại:</strong> &nbsp;
                            <span class="textThongTinCaNhan">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinCaNhan" type="text">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-sm-11 col-10 d-flex align-items-center">
                            <h6 class="mb-0">Thông tin phụ huynh</h6>
                        </div>
                        <div class="col-sm-1 col-2 text-right">
                            <a onclick="changeModeEditThongTinPhuHuynh()" class="textThongTinPhuHuynh cursor-pointer">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Sửa"></i>
                            </a>
                            <a onclick="saveThongTinPhuHuynh()" class="d-none inputThongTinPhuHuynh cursor-pointer">
                                <i class="fas fa-check text-secondary text-sm" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Lưu"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Tên bố:</strong> &nbsp;
                            <span class="textThongTinPhuHuynh">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinPhuHuynh" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Số điện thoại bố:</strong> &nbsp;
                            <span class="textThongTinPhuHuynh">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinPhuHuynh" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Nghề nghiệp bố:</strong> &nbsp;
                            <span class="textThongTinPhuHuynh">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinPhuHuynh" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Tên mẹ:</strong> &nbsp;
                            <span class="textThongTinPhuHuynh">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinPhuHuynh" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Số điện thoại mẹ:</strong> &nbsp;
                            <span class="textThongTinPhuHuynh">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinPhuHuynh" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Nghề nghiệp mẹ:</strong> &nbsp;
                            <span class="textThongTinPhuHuynh">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinPhuHuynh" type="text">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-sm-11 col-10 d-flex align-items-center">
                            <h6 class="mb-0">Thông tin khác</h6>
                        </div>
                        <div class="col-sm-1 col-2 text-right">
                            <a onclick="changeModeEditThongTinKhac()" class="textThongTinKhac cursor-pointer">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Sửa"></i>
                            </a>
                            <a onclick="saveThongTinKhac()" class="d-none inputThongTinKhac cursor-pointer">
                                <i class="fas fa-check text-secondary text-sm" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Lưu"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Giáo phận:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Giáo hạt:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Giáo xứ:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Giáo họ:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Địa chỉ:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>

                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Ngày rửa tội:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Người rửa tội:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Nguời đỡ đầu rửa tội:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>

                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Ngày thêm sức:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Người thêm sức:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Nguời đỡ đầu thêm sức:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Ngày tuyên hứa HT Cấp 1:</strong> &nbsp;
                            <span class="textThongTinKhac">123</span>
                            <input class="form-control d-inline-block w-auto d-none inputThongTinKhac" type="text">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function selectAvatar() {
        $('#avatarInput').click();
    }

    function submitAvatarForm() {
        // Trigger form submission
        $('#avatarForm').submit();
    }

    function changeModeEditThongTinCaNhan() {
        // an textThongTinCaNhan neu dang hien thi
        // hien thi inputThongTinCaNhan neu dang an
        // su dung toggle d-none

        $('.textThongTinCaNhan').toggleClass('d-none');
        $('.inputThongTinCaNhan').toggleClass('d-none');
    }

    function changeModeEditThongTinPhuHuynh() {
        $('.textThongTinPhuHuynh').toggleClass('d-none');
        $('.inputThongTinPhuHuynh').toggleClass('d-none');
    }

    function changeModeEditThongTinKhac() {
        $('.textThongTinKhac').toggleClass('d-none');
        $('.inputThongTinKhac').toggleClass('d-none');
    }

    function saveThongTinCaNhan() {
        $('.textThongTinCaNhan').toggleClass('d-none');
        $('.inputThongTinCaNhan').toggleClass('d-none');
        console.log(123)
    }

    function saveThongTinPhuHuynh() {
        $('.textThongTinPhuHuynh').toggleClass('d-none');
        $('.inputThongTinPhuHuynh').toggleClass('d-none');
    }

    function saveThongTinKhac() {
        $('.textThongTinKhac').toggleClass('d-none');
        $('.inputThongTinKhac').toggleClass('d-none');
    }
</script>
