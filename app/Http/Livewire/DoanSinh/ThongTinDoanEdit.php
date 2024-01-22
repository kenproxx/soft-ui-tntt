<?php

namespace App\Http\Livewire\DoanSinh;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThongTinDoanEdit extends Component
{
    public function render()
    {
        $thongTinDoan = \App\Models\ThongTinDoan::where('address_id', Auth::user()->location_id)->orderBy('stt', 'asc')->get();
        return view('livewire.doan-sinh.thong-tin-doan-edit', compact('thongTinDoan'));
    }
}
