<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable();
            $table->string('judul');
            $table->string('slug');
            $table->string('penulis');
            $table->text('deskripsi');
            $table->integer('halaman')->default(0);
            $table->boolean('tipe')->default(false);
            $table->string('penerbit');
            // $table->string('file_pdf');
            $table->foreignId('category_id');
            $table->boolean('populer')->default(false);
            $table->boolean('rekomendasi')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
