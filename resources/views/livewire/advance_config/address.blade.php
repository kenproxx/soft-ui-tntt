@php use App\Enums\CapBacAddress;use App\Enums\PaginateValue;use App\Models\User; $currentLocationId = '';@endphp

<div class="main-content" id="#address">
    <style>
        #address ol, #address ul, #address dl {
            margin-top: revert;
            margin-bottom: revert;
        }

        #address .pagination {
            padding-left: revert;
        }
    </style>
    <div class="card mx-4 mb-4">
        <form class="p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input wire:model="name_search" type="search" class="form-control" id="exampleFormControlInput1"
                               placeholder="name@example.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select wire:model="level_search" class="form-control" id="level_create" name="cap_bac">
                            <option value="">Tất cả</option>
                            @foreach(CapBacAddress::getArray() as $key => $value)
                                <option value="{{ $value }}">{{ $value  }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="button" wire:click="render" class="btn bg-gradient-primary">
                Tìm kiếm
            </button>
        </form>
    </div>
    <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">All Users</h5>
                </div>
                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
                   data-bs-target="#modal-create" type="button">+&nbsp; Tạo mới địa chỉ</a>
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
                            Tên
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Slug
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Cấp bậc
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Người tạo
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Ngày tạo
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Người sửa
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Ngày sửa
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Thao tác
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($addresses as $index => $item)
                        <tr>
                            <td class="ps-4">
                                <p class="text-xs font-weight-bold mb-0">{{ ++$index }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->slug }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->cap_bac }}</p>
                            </td>
                            <td class="text-center">
                                <span
                                    class="text-secondary text-xs font-weight-bold">{{ getNameUserById($item->created_by) }}</span>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->created_at }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ getNameUserById($item->updated_by) }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0" wire:click="setCurrentLocationId('{{ $item->id }}')">{{ $item->updated_at }}</p>
                            </td>
                            <td class="text-center">
                                <a href="#"
                                   data-bs-toggle="modal"
                                   data-bs-target="#modal-edit">
                                    <i class="fas fa-edit text-secondary"></i>
                                </a>
                                <a href="#" class="mx-3"
                                   data-bs-toggle="modal"
                                   onclick="selectLocation('{{ $item->id }}')"
                                   data-bs-target="#modal-set-user">
                                    <i class="fas fa-user-cog text-secondary"></i>
                                </a>
                                <span wire:click="delete('{{ $item->id }}')">
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

    {{-- phân trang --}}
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


    <!-- Modal -->
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
                <form action="{{ route('address.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name_create">Tên</label>
                            <input type="text" class="form-control" id="name_create" name="name"
                                   placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="level_create">Cấp bậc cần tạo</label>
                            <select class="form-control" id="level_create" name="cap_bac">
                                @foreach(CapBacAddress::getArray() as $key => $value)
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
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa địa chỉ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-set-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Set user quản lý</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('address.set.user') }}" method="post">
                    @csrf
                    <input type="hidden" id="location_id" name="location_id">
                    <div class="modal-body">
                        <select class="form-control" id="selectUser" name="id">
                            @foreach($userAdmin as $user)
                                <option
                                    value="{{ $user->id }}" {{ disableUserHasAdmin($user->location_id) }} {{ selectedUser($user->location_id, $currentLocationId) }}>
                                    {{ $user->holy_name . ' ' . $user->name . ' | '  . $user->username . ' - ' . $user->email   }}
                                </option>
                            @endforeach
                        </select>
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

        function selectLocation(id) {
            console.log('{{ $currentLocationId }}')
            document.getElementById('location_id').value = id;
        }

    </script>
</div>
