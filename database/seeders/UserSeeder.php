<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'code' => generateRandomString(),
            'username' => 'user',
            'name' => 'user',
            'email' => 'user@softui.com',
            'role_name' => RoleName::USER,
            'password' => Hash::make('123456')
        ]);
        User::factory()->create([
            'code' => generateRandomString(),
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@softui.com',
            'role_name' => RoleName::ADMIN,
            'password' => Hash::make('123456')
        ]);
        User::factory()->create([
            'code' => generateRandomString(),
            'username' => 'superadmin',
            'name' => 'superadmin',
            'email' => 'superadmin@softui.com',
            'role_name' => RoleName::SUPER_ADMIN,
            'password' => Hash::make('123456')
        ]);
    }
}
