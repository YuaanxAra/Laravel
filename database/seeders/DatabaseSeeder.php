<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat akun dummy untuk login
        User::factory()->create([
            'name' => 'Admin Dummy',        // ganti sesuai keinginan
            'email' => 'admin@example.com', // ganti sesuai keinginan
            'password' => Hash::make('12345678'), // password yg bisa dipakai login
        ]);

        // Buat user random lain kalau perlu
        User::factory(10)->create();
    }
}
