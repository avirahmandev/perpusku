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
            'email' => 'alexa@gmail.com',
            'password' => bcrypt('asd'),
            'wishlist' => 'none',
            'borrowed_list' => 'status pinjaman',
            'is_admin' => false
        ]);

        User::factory()->create([
            'nama_lengkap' => 'john doe',
            'slug' => 'john-doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('123'),
            'wishlist' => 'none',
            'borrowed_list' => 'status pinjaman',
            'is_admin' => false
        ]);

        User::factory()->create([
            'nama_lengkap' => 'admin',
            'slug' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'wishlist' => 'none',
            'borrowed_list' => 'status pinjaman',
            'is_admin' => true
        ]);
    }
}
