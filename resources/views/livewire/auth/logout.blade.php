<div>
    <i class="fa fa-user me-sm-1"></i>
    {{ auth()->user()->holy_name . ' ' . auth()->user()->name . ' - ' .  auth()->user()->username}} |
    <span
        class="d-sm-inline d-none"
        wire:click="logout" onclick="loadingMasterPage()">
        Đăng xuất
    </span>
</div>
