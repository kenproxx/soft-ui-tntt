<div class="card m-4">
    <form>
        @csrf
        <div id="content" class="p-4">
            <div class="row">
                <div class="col-12">
                    <button type="button" onclick="addMoreInput()" class="btn bg-gradient-primary">
                        Thêm dòng
                    </button>
                    <button type="submit" class="btn bg-gradient-primary">
                        Lưu
                    </button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Họ và tên</label>
                    <input name="name[]" placeholder="Giuse Nguyễn Văn A" type="text" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Chức vụ</label>
                    <input name="chuc_vu[]" placeholder="Xứ đoàn trưởng" type="text" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Ảnh</label>
                    <input name="avatar[]" type="file" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Số điện thoại</label>
                    <input name="sdt[]" type="number" placeholder="0123 456 789" class="form-control" required>
                </div>
            </div>
        </div>
    </form>

    <script>
        function addMoreInput() {
            const html = `<div class="form-group row border-top">
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Họ và tên</label>
                    <input name="name[]" placeholder="Maria Nguyễn Thị B" type="text" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Chức vụ</label>
                    <input name="chuc_vu[]" placeholder="Ủy viên" type="text" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Ảnh</label>
                    <input name="avatar[]" type="file" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Số điện thoại</label>
                    <input name="sdt[]" type="number" placeholder="0123 456 789" class="form-control" required>
                </div>
                <div class="col-12 col-sm-12 justify-content-center d-flex mt-3">
                    <button class="inputRemove btn bg-gradient-danger">x</button>
                </div>
            </div>`;
            $("#content").append(html);
        }

        $(document).ready(function () {
            $('body').on('click', '.inputRemove', function () {
                $(this).parent().parent('div.form-group.row.border-top').remove()
            });

            $('form').submit(function (e) {
                e.preventDefault(); // Prevent the default form submission
                const formData = $(this).serialize();

                $.post({
                    url: '{{ route('doan-sinh.thong-tin-doan.update') }}',
                    data: formData,
                });
            });
        });
    </script>
</div>
