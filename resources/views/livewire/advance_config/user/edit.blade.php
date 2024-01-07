<div class="main-content" id="#user_management">
    <div class=" mb-4 mx-4">
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn bg-gradient-primary">
                    Lưu
                </button>
            </div>

            <div class="row">
                <div class="col-sm-4 col-12 ">
                    <div class="accordion-1">
                        <div class="accordion" id="accordionRentalInfo">
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-bottom font-weight-bold collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">
                                        Thông tin cá nhân
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseOne" class="accordion-collapse collapse card p-4 mt-1"
                                     aria-labelledby="headingOne" data-bs-parent="#accordionRentalInfo" style="">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" value="{{ $user->code }}" readonly class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="text" value="{{ $user->username }}" readonly class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Thánh</label>
                                        <input type="text" value="{{ $user->holy_name ?? '' }}" name="holy_name"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên gọi</label>
                                        <input type="text" value="{{ $user->name ?? '' }}" name="name"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <select class="form-control" name="sex">
                                            @foreach(\App\Enums\GioiTinhEnum::getArray() as $key => $value)
                                                <option value="{{ $value }}">{{ $value  }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" value="{{ $user->userInfo->date_of_birth ?? '' }}"
                                               class="form-control" name="date_of_birth"
                                               placeholder="Ngày tháng năm sinh">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="number" value="{{ $user->userInfo->my_phone ?? '' }}"
                                               class="form-control" name="my_phone"
                                               placeholder="Số điện thoại cá nhân">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" value="{{ $user->userInfo->my_email ?? '' }}"
                                               class="form-control" name="my_email"
                                               placeholder="Email cá nhân">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input type="file" class="form-control" name="avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-8 col-12 ">
                    <div class="accordion-1">
                        <div class="accordion" id="accordionRental">
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingThree">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                        Thông tin gia đình
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseThree" class="accordion-collapse collapse card p-4 mt-1"
                                     aria-labelledby="headingThree" data-bs-parent="#accordionRental">
                                    <div class="form-group">
                                        <label>Tên bố</label>
                                        <input type="text" value="{{ $user->userInfo->ten_bo ?? '' }}"
                                               class="form-control" name="ten_bo"
                                               placeholder="Tên thánh & tên gọi của bố">
                                    </div>
                                    <div class="form-group">
                                        <label>Nghề nghiệp bố</label>
                                        <input type="text" value="{{ $user->userInfo->nghe_nghiep_bo ?? '' }}"
                                               class="form-control" name="nghe_nghiep_bo"
                                               placeholder="Nghề nghiệp của bố">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại bố</label>
                                        <input type="text" value="{{ $user->userInfo->sdt_bo ?? '' }}"
                                               class="form-control" name="sdt_bo"
                                               placeholder="Số điện thoại của bố">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên mẹ</label>
                                        <input type="text" value="{{ $user->userInfo->ten_me ?? '' }}"
                                               class="form-control" name="ten_me"
                                               placeholder="Tên thánh & tên gọi của mẹ">
                                    </div>
                                    <div class="form-group">
                                        <label>Nghề nghiệp mẹ</label>
                                        <input type="text" value="{{ $user->userInfo->nghe_nghiep_me ?? '' }}"
                                               class="form-control" name="nghe_nghiep_me"
                                               placeholder="Nghề nghiệp của mẹ">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại mẹ</label>
                                        <input type="text" value="{{ $user->userInfo->sdt_me ?? '' }}"
                                               class="form-control" name="sdt_me"
                                               placeholder="Số điện thoại của mẹ">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                        Thông tin địa chỉ
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseTwo" class="accordion-collapse collapse card p-4 mt-1"
                                     aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                                    <div class="form-group">
                                        <label>Giáo phận</label>
                                        <select class="form-control" id="giao_phan_id" name="giao_phan_id"
                                                onchange="getListGiaoHat(this.value)">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giáo hạt</label>
                                        <select class="form-control" id="giao_hat_id" name="giao_hat_id"
                                                onchange="getListGiaoXu(this.value)">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giáo xứ</label>
                                        <select class="form-control" id="giao_xu_id" name="giao_xu_id"
                                                onchange="getListGiaoHo(this.value)">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giáo họ</label>
                                        <select class="form-control" id="giao_ho_id" name="giao_ho_id">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" value="{{ $user->userInfo->dia_chi ?? '' }}"
                                               class="form-control" name="dia_chi"
                                               placeholder="Địa chỉ hành chính của gia đình">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingFour">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                        Ngày kỉ niệm
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseFour" class="accordion-collapse collapse card p-4 mt-1"
                                     aria-labelledby="headingFour" data-bs-parent="#accordionRental">
                                    <div class="form-group">
                                        <label>Ngày rửa tội</label>
                                        <input type="date" value="{{ $user->userInfo->ngay_rua_toi ?? '' }}"
                                               class="form-control" name="ngay_rua_toi"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Người ban bí tích rửa tội</label>
                                        <input type="text" value="{{ $user->userInfo->nguoi_rua_toi ?? '' }}"
                                               class="form-control" name="nguoi_rua_toi"
                                               placeholder="Người ban bí tích rửa tội">
                                    </div>
                                    <div class="form-group">
                                        <label>Người đỡ đầu rửa tội</label>
                                        <input type="text" value="{{ $user->userInfo->nguoi_do_dau_rua_toi ?? '' }}"
                                               class="form-control"
                                               name="nguoi_do_dau_rua_toi"
                                               placeholder="Người đỡ đầu rửa tội">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày thêm sức</label>
                                        <input type="date" value="{{ $user->userInfo->ngay_them_suc ?? '' }}"
                                               class="form-control" name="ngay_them_suc"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Người ban bí tích thêm sức</label>
                                        <input type="text" value="{{ $user->userInfo->nguoi_them_suc ?? '' }}"
                                               class="form-control" name="nguoi_them_suc"
                                               placeholder="Người ban bí tích thêm sức">
                                    </div>
                                    <div class="form-group">
                                        <label>Người đỡ đầu thêm sức</label>
                                        <input type="text" value="{{ $user->userInfo->nguoi_do_dau_them_suc ?? '' }}"
                                               class="form-control"
                                               name="nguoi_do_dau_them_suc"
                                               placeholder="Người đỡ đầu thêm sức">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header" id="headingFifth">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFifth"
                                            aria-expanded="false" aria-controls="collapseFifth">
                                        Thông tin khác
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapseFifth" class="accordion-collapse collapse card p-4 mt-1"
                                     aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
                                    <div class="form-group">
                                        <label>Chức vụ</label>
                                        <input type="text" value="{{ $user->userInfo->chuc_vu ?? '' }}"
                                               class="form-control" name="chuc_vu"
                                               placeholder="Chức vụ">
                                    </div>
                                    <div class="form-group">
                                        <label>Cấp hiệu</label>
                                        <input type="text" value="{{ $user->userInfo->cap_hieu ?? '' }}"
                                               class="form-control" name="cap_hieu"
                                               placeholder="Cấp hiệu">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày tuyên hứa Huynh trưởng cấp 1</label>
                                        <input type="date" value="{{ $user->userInfo->ngay_tuyen_hua_ht_1 ?? '' }}"
                                               class="form-control" name="ngay_tuyen_hua_ht_1"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function objectToArray(obj) {
            return Object.values(obj).map(function (item) {
                if (item.children && item.children.length > 0) {
                    item.children = objectToArray(item.children);
                }
                return item;
            });
        }

        const listAddress = [];

        const isResetOption = -1;
        const giaoPhanId = '{{ $user->userInfo->giao_phan_id ?? '' }}';
        const giaoHatId = '{{ $user->userInfo->giao_hat_id ?? '' }}';
        const giaoXuId = '{{ $user->userInfo->giao_xu_id ?? '' }}';
        const giaoHoId = '{{ $user->userInfo->giao_ho_id ?? '' }}';

        getListGiaoPhan();

        async function getListGiaoPhan() {
            const url = '{{ route('dia-chi.giao-phan') }}';
            let response = await fetch(url);
            response = await response.json();


            renderJsonToHtml(response, 'giao_phan_id', giaoPhanId);

            if (response.length === 0) {
                getListGiaoHat(isResetOption);
                return
            }
            getListGiaoHat();
        }

        async function getListGiaoHat() {
            const id = $('#giao_phan_id').val();

            let url = '{{ route('dia-chi.giao-hat', ['id' => ':id']) }}';
            url = url.replace(':id', id)

            let response = await fetch(url);
            response = await response.json();

            renderJsonToHtml(response, 'giao_hat_id', giaoHatId);

            if (response.length === 0) {
                getListGiaoXu(isResetOption);
                return
            }

            getListGiaoXu(response[0].id);
        }

        async function getListGiaoXu() {
            const id = $('#giao_hat_id').val();

            let url = '{{ route('dia-chi.giao-xu', ['id' => ':id']) }}';
            url = url.replace(':id', id)

            let response = await fetch(url);
            response = await response.json();

            renderJsonToHtml(response, 'giao_xu_id', giaoXuId);

            if (response.length === 0) {
                getListGiaoHo(isResetOption);
                return
            }

            getListGiaoHo(response[0].id);
        }

        async function getListGiaoHo() {
            const id = $('#giao_xu_id').val();

            let url = '{{ route('dia-chi.giao-ho', ['id' => ':id']) }}';
            url = url.replace(':id', id)

            let response = await fetch(url);
            response = await response.json();

            renderJsonToHtml(response, 'giao_ho_id', giaoHoId);
        }

        function renderJsonToHtml(data, idDiv, idCheck = null) {
            let html = '';

            if (data.length === 0) {
                html += `<option value="" disabled selected>Không có dữ liệu</option>`;
                $('#' + idDiv).html(html);
                return;
            }

            data.forEach(function (item) {
                if (idCheck && item.id == idCheck) {
                    html += '<option value="' + item.id + '" selected>' + item.name + '</option>';
                    return;
                }
                html += '<option value="' + item.id + '">' + item.name + '</option>';
            })
            $('#' + idDiv).html(html);
        }

    </script>
</div>
