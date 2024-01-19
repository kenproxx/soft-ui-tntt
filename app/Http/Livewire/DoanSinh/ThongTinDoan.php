<?php

namespace App\Http\Livewire\DoanSinh;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThongTinDoan extends Component
{
    public function render()
    {
        $listInfo = \App\Models\ThongTinDoan::where('address_id', Auth::user()->location_id)->orderBy('stt', 'asc')->get();
        return view('livewire.doan-sinh.thong-tin-doan', compact('listInfo'));
    }
}
