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
                               placeholder="Nhập vào tên, hoặc mã lớp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select wire:model="nganh" class="form-control">
                            <option value="">Tất cả</option>
                            @foreach(\App\Enums\CapHieu::getListThieuNhi() as $key => $value)
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
                        Danh sách lớp
                    </h5>
                </div>
                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal"
                   data-bs-target="#modal-create">+ Tạo mới lớp</a>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            ID
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Mã lớp
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tên lớp
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Ngành
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Vị trí
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Ngày tạo
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Người tạo
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listClass as $index => $class)
                        <tr>
                            <td class="ps-4">
                                <p class="text-xs font-weight-bold mb-0">{{ ++$index }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $class->ma_lop }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $class->ten_lop }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $class->nganh }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ getNameAddressById($class->location_id) }}</p>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $class->created_at }}</span>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ getFullNameUserById($class->created_by) }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $class->id) }}" data-bs-toggle="tooltip"
                                   data-bs-original-title="Sửa">
                                    <i class="fas fa-user-edit text-secondary" data-bs-toggle="modal"
                                       data-bs-target="#modal-edit"></i>
                                </a>
                                <span data-bs-toggle="tooltip" onclick="setValueIdClass('{{ $class->id }}')"
                                      data-bs-original-title="Thêm thành viên" class="mx-3">
                                            <i class="far fa-address-book text-secondary" data-bs-toggle="modal"
                                               data-bs-target="#modal-add-user"></i>
                                        </span>
                                <span data-bs-toggle="tooltip"
                                      data-bs-original-title="Xóa">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tạo mới lớp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('doan-sinh.danh-sach-lop.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên lớp</label>
                            <input type="text" class="form-control" name="ten_lop" required
                                   placeholder="Tên lớp học">
                        </div>
                        <div class="form-group">
                            <label for="username">Mã lớp</label>
                            <input type="text" class="form-control" name="ma_lop" maxlength="10"
                                   placeholder="Mã lớp, tối đa 10 ký tự, nếu không nhập thì sẽ tự động tạo">
                        </div>
                        <div class="form-group">
                            <label for="password">Ngành</label>
                            <select class="form-control" name="nganh">
                                @foreach(\App\Enums\CapHieu::getListThieuNhi() as $key => $value)
                                    <option value="{{ $value }}">{{ $value  }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin lớp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('doan-sinh.danh-sach-lop.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên lớp</label>
                            <input type="text" class="form-control" name="ten_lop" required
                                   placeholder="Tên lớp học">
                        </div>
                        <div class="form-group">
                            <label for="username">Mã lớp</label>
                            <input type="text" class="form-control" name="ma_lop" maxlength="10"
                                   placeholder="Mã lớp, tối đa 10 ký tự, nếu không nhập thì sẽ tự động tạo">
                        </div>
                        <div class="form-group">
                            <label for="password">Ngành</label>
                            <select class="form-control" name="nganh">
                                @foreach(\App\Enums\CapHieu::getListThieuNhi() as $key => $value)
                                    <option value="{{ $value }}">{{ $value  }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa thành viên lớp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('doan-sinh.danh-sach-lop.add-member') }}" method="post" onsubmit="return handleSubmitAddUser()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password">Thêm thành viên vào lớp</label>
                            <input type="text" id="select-user" placeholder="Select">
                        </div>
                        <input type="hidden" name="idClass" id="id-class">
                        <input type="hidden" name="list-user">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const listUser = objectToArray(@json($listUser));

        let instanceUser = $('#select-user').comboTree({
            source: listUser,
            collapse: true,
            isMultiple: true,
        });

        function setValueIdClass(id) {
            $('#id-class').val(id);
        }

        function objectToArray(obj) {
            return Object.values(obj).map(function (item) {
                if (item.children && item.children.length > 0) {
                    item.children = objectToArray(item.children);
                }
                return item;
            });
        }

        function handleSubmitAddUser() {
            let selected = instanceUser.getSelectedIds();
            $('input[name="list-user"]').val(selected);
            return true;
        }
    </script>
</div>
