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
        Schema::create('produk', function (Blueprint $table) {
            $table->id(); // Kolom id otomatis sebagai primary key dan auto-increment
            $table->unsignedBigInteger('kategori_produk_id'); // Foreign key untuk kategori produk
            $table->string('nama'); // Kolom nama produk
            $table->integer('harga'); // Kolom harga produk
            $table->string('gambar')->nullable(); // Kolom gambar produk, nullable
            $table->integer('stok'); // Kolom stok produk
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at

            // Menambahkan foreign key constraint dengan ON UPDATE CASCADE dan ON DELETE CASCADE
            $table->foreign('kategori_produk_id')
                ->references('id')
                ->on('kategori_produk')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
