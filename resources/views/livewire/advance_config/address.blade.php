@php use App\Enums\CapBacAddress; @endphp
<div class="main-content">
    <div class="card mx-4 mb-4">
        <form class="p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input wire:model="name_search" type="text" class="form-control" id="exampleFormControlInput1"
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
                            Name
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Slug
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Caaps bac
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nguoi tao
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Ngayf tao
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nguoi sua
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            ngay sua
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($addresses as $index => $item)
                        <tr>
                            <td class="ps-4">
                                <p class="text-xs font-weight-bold mb-0">1</p>
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
                                <span class="text-secondary text-xs font-weight-bold">{{ $item->created_by }}</span>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->created_at }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->updated_by }}</p>
                            </td>
                            <td class="text-center">
                                <p class="text-xs font-weight-bold mb-0">{{ $item->updated_at }}</p>
                            </td>
                            <td class="text-center">
                                <a href="#" class="mx-3"
                                   data-bs-toggle="modal"
                                   data-bs-target="#modal-create">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                <span>
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


</div>

<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tạo mới địa ch</h5>
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
