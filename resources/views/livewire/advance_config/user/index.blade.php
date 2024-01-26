@php use App\Enums\PaginateValue;use App\Enums\RoleName; @endphp
<div class="main-content" id="#user_management">
    <style>
        #user_management ol, #user_management ul, #user_management dl {
            margin-top: revert;
            margin-bottom: revert;
        }

        #user_management .pagination {
            padding-left: revert;
        }
    </style>
    <div class="card mx-4 mb-4">
        <form class="p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input wire:model="keyword_search" type="search" class="form-control"
                               placeholder="Nhập vào tên, tên đăng nhập, code, hoặc email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select wire:model="role_search" class="form-control">
                            <option value="">Tất cả</option>
                            @foreach(RoleName::getArray() as $key => $value)
                                <option value="{{ $value }}">{{ $value  }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <button type="button" wire:click="render" class="btn bg-gradient-primary">
                        Tìm kiếm
                    </button>
                </div>
            </div>

        </form>
    </div>

    <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">
                        Danh sách tài khoản
                    </h5>
                </div>
                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                   data-bs-target="#modal-create">+ Tạo mới tài khoản</a>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            STT
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Ảnh đại diện
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tên
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Username
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Email
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Quyền
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Ngày tạo
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <td class="ps-4">
                                <p class="text-xs font-weight-bold mb-0">{{ ++$index }}</p>
                            </td>
                            <td>
                                <div>
                                    <img src="{{ $user->avatar ?? '../assets/img/team-2.jpg' }}" class="avatar avatar-sm me-3 object-cover" loading="lazy">
                                </div>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->username }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->role_name }}</p>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $user->id) }}" onclick="loadingMasterPage()" class="mx-3"
                                   data-bs-toggle="tooltip"
                                   data-bs-original-title="Sửa">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>

                                <span data-bs-toggle="tooltip"
                                      data-bs-original-title="Xóa" onclick="handleDestroyUser(this)">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card m-4">
        <div class="row m-4">
            <div class="col-5 col-sm-3">
                <div class="row">
                    <div class="col-6 col-sm-6 d-flex align-items-center">
                        Hiển thị:
                    </div>
                    <div class="col-6 col-sm-6">
                        <select class="form-control " id="per_page" name="per_page" wire:model="perPage">
                            @foreach(PaginateValue::getArray() as $key => $value)
                                <option value="{{ $value }}">{{ $value  }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="col-7 col-sm-9">
                <div class="pagination-container justify-content-center d-flex">
                    <ul class="pagination pagination-warning">
                        <li class="page-item" disabled="">
                            <a class="page-link" href="javascript:" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                            </a>
                        </li>

                        {{-- Display 2 pages before current page --}}
                        @for ($page = max(1, $currentPage - 2); $page < $currentPage; $page++)
                            <li class="page-item">
                                <label class="page-link">
                                    {{ $page }}
                                    <input type="radio" wire:model="currentPage" name="currentPage"
                                           value="{{ $page }}"
                                           class="visually-hidden">
                                </label>
                            </li>
                        @endfor

                        {{-- Current page --}}
                        <li class="page-item active">
                            <label class="page-link">
                                {{ $currentPage }}
                                <input type="radio" wire:model="currentPage" name="currentPage"
                                       value="{{ $currentPage }}"
                                       class="visually-hidden">
                            </label>
                        </li>

                        {{-- Display 2 pages after current page --}}
                        @for ($page = $currentPage + 1; $page <= min($totalPage, $currentPage + 2); $page++)
                            <li class="page-item">
                                <label class="page-link">
                                    {{ $page }}
                                    <input type="radio" wire:model="currentPage" name="currentPage"
                                           value="{{ $page }}"
                                           class="visually-hidden">
                                </label>
                            </li>
                        @endfor


                        <li class="page-item" disabled="">
                            <a class="page-link" href="javascript:" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo mới địa chỉ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.store') }}" method="post" onsubmit="loadingMasterPage()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                   placeholder="Tên">
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" name="username" required
                                   placeholder="Tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                   minlength="6"
                                   placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="role_name">Cấp bậc cần tạo</label>
                            <select class="form-control" id="role_name" name="role_name" required>
                                @foreach(RoleName::getArray() as $key => $value)
                                    <option
                                        value="{{ $value }}"
                                        {{ $value === RoleName::SUPER_ADMIN && isOnlyRoleAdmin() ? 'disabled' : '' }}
                                        {{ $value === RoleName::USER ? 'selected' : '' }}>
                                        {{ $value  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn bg-gradient-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
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

        const listAddress = objectToArray(@json($listAddress));

        let instanceEdit = $('#parent_select_search').comboTree({
            source: listAddress,
            collapse: true,
        });

        function handleDestroyUser(element) {
            swal("Xác nhận xóa tài khoản này?", {
                dangerMode: true,
                buttons: ["Hủy", "Đồng ý"],

            }).then((willDelete) => {
                // 'willDelete' là một biến boolean, có giá trị là true nếu người dùng nhấn nút "OK", và false nếu nhấn nút "Cancel"
                if (willDelete) {
                    // Hàm sẽ được gọi khi người dùng nhấn nút "OK"
                    loadingMasterPage();
                    $(element).next().submit();
                }
            });
        }

    </script>

</div>
