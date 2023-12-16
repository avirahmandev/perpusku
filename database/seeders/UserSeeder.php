<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'nama_lengkap' => 'alexa like',
            'slug' => 'alexa-like',
            'email' => 'test@example.com',
            'password' => bcrypt('asd'),
            'wishlist' => 'asd asd',
            'status_pinjaman' => 'ini status pinjaman',
        ]);

        User::factory()->create([
            'nama_lengkap' => 'john like',
            'slug' => 'john-like',
            'email' => 'john@example.com',
            'password' => bcrypt('123'),
            'wishlist' => '123 123',
            'status_pinjaman' => 'ini status pinjaman',
        ]);

    }
}
