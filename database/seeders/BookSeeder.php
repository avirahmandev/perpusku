<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()->create([
            'judul'     => 'How to Win Friends and Influence people',
            'penulis'   => 'Dale Carnegie',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'Berani Tidak Disukai',
            'penulis'   => 'Fumitake Koga',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Filosofi teras',
            'penulis'   => 'Henry Manampiring',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'Basic Python',
            'penulis'   => 'SpamEgg',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 1,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'C++ Fundamentals',
            'penulis'   => 'HelloWorld',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 1,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Atomic Habits',
            'penulis'   => 'James Clear',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Dunia Sophie',
            'penulis'   => 'Jostein Gaarder',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 3,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'penulis'   => 'Mark Manson',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'Madilog Materialisme, Dialektika, Dan Logika',
            'penulis'   => 'Tan Malaka',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 3,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'I Want To Die But I Want To Eat Tteokpokki',
            'penulis'   => 'Baek Se Hee',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => false,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'The Psychology of Money',
            'penulis'   => 'Morgan Housel',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Madilog Materialisme, Dialektika, Dan Logika',
            'penulis'   => 'Tan Malaka',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 3,
            'populer' => false,
            'rekomendasi' => true,
        ]);
    }
}
