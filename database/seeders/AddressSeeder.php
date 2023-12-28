<?php

namespace Database\Seeders;

use App\Enums\CapBacAddress;
use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = new Address();
        $address->name = 'Toàn quốc';
        $address->slug = 'VN';
        $address->cap_bac = CapBacAddress::TOAN_QUOC;

        $address->save();
    }
}
