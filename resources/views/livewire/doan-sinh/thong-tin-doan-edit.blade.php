<div class="card m-4">
    <div id="content" class="p-4">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <button type="button" onclick="addMoreInput()" class="btn bg-gradient-primary">
                        Thêm dòng
                    </button>
                    <button type="submit" onclick="addMoreInput()" class="btn bg-gradient-primary">
                        Lưu
                    </button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Họ và tên</label>
                    <input name="name" placeholder="Giuse Nguyễn Văn A" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Chức vụ</label>
                    <input name="chuc_vu" placeholder="Xứ đoàn trưởng" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Ảnh</label>
                    <input name="avatar" type="file" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Số điện thoại</label>
                    <input name="sdt" type="text" placeholder="0123 456 789" class="form-control">
                </div>
            </div>
        </form>
    </div>

    <script>
        function addMoreInput() {
            const html = `<div class="form-group row border-top">
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Họ và tên</label>
                    <input name="name" placeholder="Maria Nguyễn Thị B" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Chức vụ</label>
                    <input name="chuc_vu" placeholder="Ủy viên" type="text" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Ảnh</label>
                    <input name="avatar" type="file" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-xl-3 ">
                    <label>Số điện thoại</label>
                    <input name="sdt" type="text" placeholder="0123 456 789" class="form-control">
                </div>
            </div>`;
            $("#content").append(html);
        }

        $(document).ready(function () {

            $('body').on('click', '.inputRemove', function () {
                $(this).parent('div.required_inp').remove()
            });
        });
    </script>
</div>
