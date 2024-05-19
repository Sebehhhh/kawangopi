<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tentang', function (Blueprint $table) {
            // $table->id(); // Kolom id otomatis sebagai primary key dan auto-increment
            $table->string('nama'); // Kolom nama
            $table->text('visi'); // Kolom visi
            $table->text('misi'); // Kolom misi
            $table->text('sejarah'); // Kolom sejarah
            $table->string('alamat'); // Kolom alamat
            $table->string('telp'); // Kolom telepon
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang');
    }
};
