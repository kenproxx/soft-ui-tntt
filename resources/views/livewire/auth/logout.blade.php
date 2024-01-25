<div>
    <i class="fa fa-user me-sm-1 {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}"></i>
    {{ auth()->user()->holy_name . ' ' . auth()->user()->name . ' - ' .  auth()->user()->username}} |
    <span
        class="d-sm-inline d-none {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}"
        wire:click="logout" onclick="loadingMasterPage()">
        Đăng xuất
    </span>
</div>
