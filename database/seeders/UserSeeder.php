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
            'email' => 'test@gmail.com',
            'password' => bcrypt('asd'),
            'wishlist' => 'asd asd',
            'borrowed_list' => 'ini status pinjaman',
            'is_admin' => false
        ]);

        User::factory()->create([
            'nama_lengkap' => 'john like',
            'slug' => 'john-like',
            'email' => 'john@gmail.com',
            'password' => bcrypt('123'),
            'wishlist' => '123 123',
            'borrowed_list' => 'ini status pinjaman',
            'is_admin' => false
        ]);

        User::factory()->create([
            'nama_lengkap' => 'dani',
            'slug' => 'dani',
            'email' => 'dani@gmail.com',
            'password' => bcrypt('asdasd'),
            'wishlist' => '123 123',
            'borrowed_list' => 'ini status pinjaman',
            'is_admin' => true
        ]);
    }
}
