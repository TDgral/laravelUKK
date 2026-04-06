<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'nama' => 'Asep',
            'nama_lengkap' => 'Asep Jakun',
            'username' => 'AsepJakun42145',
            'email' => 'asepjakun@test.com',
            'password' => '12345',
            'role' => 'admin',
            'alamat' => 'Jln. Testing',
            'telepon' => '0000'
        ]);
    }
}
