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
            'slug'      => 'how-to-win-friends-and-influence-people',
            'penulis'   => 'Dale Carnegie',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer'   => true,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'Berani Tidak Disukai',
            'slug'      => 'berani-tidak-disukai',
            'penulis'   => 'Fumitake Koga',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Filosofi teras',
            'slug'      => 'filosofi-teras',
            'penulis'   => 'Henry Manampiring',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'Basic Python',
            'slug'      => 'basic-python',
            'penulis'   => 'SpamEgg',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 1,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'C++ Fundamentals',
            'slug'      => 'cpp-fundamentals',
            'penulis'   => 'HelloWorld',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 1,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Atomic Habits',
            'slug'      => 'atomic-habits',
            'penulis'   => 'James Clear',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Dunia Sophie',
            'slug'      => 'dunia-sophie',
            'penulis'   => 'Jostein Gaarder',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 3,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Sebuah Seni untuk Bersikap Bodo Amat',
            'slug'      => 'sebuah-seni-untuk-bersikap-bodo-amat',
            'penulis'   => 'Mark Manson',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => true,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'Madilog Materialisme, Dialektika, Dan Logika',
            'slug'      => 'madilog-materialisme-dialektika-dan-logika',
            'penulis'   => 'Tan Malaka',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 3,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'I Want To Die But I Want To Eat Tteokpokki',
            'slug'      => 'i-want-to-die-but-i-want-to-eat-tteokpokki',
            'penulis'   => 'Baek Se Hee',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => false,
            'rekomendasi' => false,
        ]);

        Book::factory()->create([
            'judul'     => 'The Psychology of Money',
            'slug'      => 'the-psychology-of-money',
            'penulis'   => 'Morgan Housel',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 2,
            'populer' => false,
            'rekomendasi' => true,
        ]);

        Book::factory()->create([
            'judul'     => 'Linux Command Guide',
            'slug'      => 'linux-command-guide',
            'penulis'   => 'Linus Torvalds',
            'tipe'      => false,
            'penerbit'  => 'GoalKicker',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'category_id' => 1,
            'populer' => true,
            'rekomendasi' => true,
        ]);
    }
}
