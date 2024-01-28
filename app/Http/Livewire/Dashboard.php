<?php

namespace App\Http\Livewire;

use App\Enums\CapHieu;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $listUserBelow = User::whereIn('location_id', getIdAddressAndChild())->with('userInfo')->get();

        $countChienCon = $listUserBelow->where('userInfo.cap_hieu', CapHieu::CHIEN_CON)->count();
        $countAuNhi = $listUserBelow->where('userInfo.cap_hieu', CapHieu::AU_NHI)->count();
        $countThieuNhi = $listUserBelow->where('userInfo.cap_hieu', CapHieu::THIEU_NHI)->count();
        $countNghiaSy = $listUserBelow->where('userInfo.cap_hieu', CapHieu::NGHIA_SY)->count();
        $countHiepSy = $listUserBelow->where('userInfo.cap_hieu', CapHieu::HIEP_SY)->count();
        $countTroTa = $listUserBelow->where('userInfo.cap_hieu', CapHieu::TRO_TA)->count();
        $countDuTruong = $listUserBelow->where('userInfo.cap_hieu', CapHieu::DU_TRUONG)->count();
        $countHuynhTruong = $listUserBelow->whereIn('userInfo.cap_hieu',
            [CapHieu::HUYNH_TRUONG_C1, CapHieu::HUYNH_TRUONG_C2, CapHieu::HUYNH_TRUONG_C3,
                CapHieu::HLV_1, CapHieu::HLV_2, CapHieu::HLV_3,])->count();


        return view('livewire.dashboard',
            compact('countChienCon', 'countAuNhi', 'countThieuNhi', 'countNghiaSy',
                'countHiepSy', 'countTroTa', 'countDuTruong', 'countHuynhTruong'));
    }
}
