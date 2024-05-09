<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();
        User::factory(10)->noPassword()->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '09109110444',
            'address' => 'yangon',
            'is_admin' => true,
            'password' => 'admin123',
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone' => '09109110464',
            'address' => 'yangon',
            'is_admin' => false,
            'password' => 'password'
        ]);

        User::factory()->create([
            'name' => 'thawzin',
            'email' => 'thawzin@gmail.com',
            'phone' => '09696629061',
            'address' => 'Bago',
            'is_admin' => true,
            'password' => 'thawzin@229',
        ]);
    }
}
